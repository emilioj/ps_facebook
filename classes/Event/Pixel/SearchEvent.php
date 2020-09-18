<?php

namespace PrestaShop\Module\PrestashopFacebook\Event\Pixel;

use PrestaShop\Module\PrestashopFacebook\Event\PixelEventInterface;

class SearchEvent extends BaseEvent implements PixelEventInterface
{
    public function sendToBuffer($buffer, $event)
    {
        $pixel_id = \Configuration::get('PS_PIXEL_ID');
        if (empty($pixel_id)) {
            return;
        }
        $type = 'Search';
        $track = 'trackCustom';

        $searchQuery = pSQL($event['searched_query']);
        $totalResults = pSQL($event['total']);
        $content = [
            'search_string' => $searchQuery,
            'total_results' => $totalResults
        ];
        $content = $this->formatPixel($content);

        $smartyVariables = [
            'pixel_fc' => $this->module->front_controller,
            'id_pixel' => pSQL($pixel_id),
            'type' => $type,
            'content' => $content,
            'track' => $track,
        ];

        if ($this->context->customer->id) {
            $smartyVariables['userInfos'] = $this->getCustomerInformations();
        }

        $this->context->smarty->assign($smartyVariables);
        $buffer->add($this->module->display($this->module->getfilePath(), '/views/templates/hook/fbTrack.tpl'));
    }
}
