<!--**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *-->
<template>
  <div v-if="loading" class="page-spinner" />
  <b-card class="card m-3" v-else id="catalogCategoryMatchingEdit">
    <!-- Large screen -->
    <div class="d-none d-md-block">
      <b-button
        class="float-left mr-3"
        variant="outline-secondary"
        @click="$parent.back"
      >
        <i class="material-icons">keyboard_backspace</i>
        {{ $t('catalogSummary.backButton') }}
      </b-button>
      <div class="counter float-right ml-5">
        <h3>
          {{matchingProgress.matched}} / {{matchingProgress.total}}
          <br />
          <span>{{ $t('categoryMatching.counterSubTitle') }}</span>
        </h3>
      </div>
      <h1>{{ $t('catalogSummary.categoryMatching') }}</h1>
    </div>

    <!-- Small screen -->
    <div class="d-block d-md-none">
      <b-button
        class="w-auto mb-3"
        variant="outline-secondary"
        @click="$parent.back"
      >
        <i class="material-icons">keyboard_backspace</i>
        {{ $t('catalogSummary.backButton') }}
      </b-button>
      <h1>{{ $t('catalogSummary.categoryMatching') }}</h1>
      <div class="counter">
        <h3>
          {{matchingProgress.matched}} / {{matchingProgress.total}}
          <br />
          <span>{{ $t('categoryMatching.counterSubTitle') }}</span>
        </h3>
      </div>
    </div>

    <p class="py-3">
      {{ $t('categoryMatching.intro') }}
    </p>

    <p>
      [TODO: filter]
    </p>

    [TODO : table component to insert here]
  </b-card>
</template>

<script>
import {defineComponent} from '@vue/composition-api';
import {BButton, BCard} from 'bootstrap-vue';

export default defineComponent({
  name: 'CatalogCategoryMatchingEdit',
  components: {
    BButton,
    BCard,
  },
  props: {
    data: {
      type: Object,
      required: false,
      default: null,
    },
  },
  computed: {
  },
  data() {
    return {
      loading: true,
      matchingProgress: this.data ? this.data.matchingProgress : {total: '--', matched: '--'},
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      // TODO !0
      this.loading = false;
    },
  },
  watch: {
  },
});
</script>

<style lang="scss" scoped>
  .card {
    border: none;
    border-radius: 3px;
    overflow: hidden;

    & > .card-body {
      padding: 1rem;
    }

    & h1 {
      margin-top: 0.2rem;
    }
  }

  .counter {
    &.float-right {
      text-align: right;
    }
    & > h3 {
      color: #CD9321 !important;
      line-height: 1;

      & > span {
        font-size: x-small;
        font-weight: normal;
        color: #363A41 !important;
      }
    }
  }
</style>