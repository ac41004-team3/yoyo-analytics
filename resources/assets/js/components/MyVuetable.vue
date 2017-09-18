<!--<template>-->
    <!--<div>-->
        <!--&lt;!&ndash;<filter-bar></filter-bar>&ndash;&gt;-->
        <!--<vuetable ref="vuetable"-->
                  <!--api-url="/getData"-->
                  <!--:fields="fields"-->
                  <!--pagination-path=""-->
                  <!--:css="css.table"-->
                  <!--:sort-order="sortOrder"-->
                  <!--:multi-sort="true"-->
                  <!--detail-row-component="my-detail-row"-->
                  <!--:append-params="moreParams"-->
                  <!--@vuetable:cell-clicked="onCellClicked"-->
                  <!--@vuetable:pagination-data="onPaginationData"-->

        <!--&gt;</vuetable>-->
        <!--<div class="vuetable-pagination">-->
            <!--<vuetable-pagination-info ref="paginationInfo"-->
                                      <!--info-class="pagination-info"-->
            <!--&gt;</vuetable-pagination-info>-->
            <!--<vuetable-pagination ref="pagination"-->
                                 <!--:css="css.pagination"-->
                                 <!--@vuetable-pagination:change-page="onChangePage"-->
            <!--&gt;</vuetable-pagination>-->
        <!--</div>-->
    <!--</div>-->
<!--</template>-->

<!--<script>-->
<!--import Vuetable from 'vuetable-2/src/components/Vuetable'-->
<!--import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'-->
<!--import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'-->
<!--import Vue from 'vue'-->
<!--import VueEvents from 'vue-events'-->
<!--//import CustomActions from './CustomActions'-->

<!--Vue.use(VueEvents);-->
<!--//Vue.component('custom-actions', CustomActions);-->
<!--//Vue.component('my-detail-row', DetailRow);-->
<!--//Vue.component('filter-bar', FilterBar);-->
<!--export default {-->
    <!--components: {-->
        <!--Vuetable,-->
        <!--VuetablePagination,-->
        <!--VuetablePaginationInfo,-->
    <!--},-->
    <!--data () {-->
        <!--return {-->
            <!--fields: [-->

                <!--{-->
                    <!--name: 'name',-->
                    <!--sortField: 'name',-->
                <!--},-->
                <!--{-->
                    <!--name: 'email',-->
                    <!--sortField: 'email'-->
                <!--},-->
                <!--{-->
                    <!--name: 'is_admin',-->
                    <!--sortField: 'is_admin',-->

                <!--},-->
                <!--{-->
                    <!--name: 'is_active',-->
                    <!--sortField: 'is_active',-->

                <!--},-->

                <!--{-->
                    <!--name: '__component:custom-actions',-->
                    <!--title: 'Actions',-->
                    <!--titleClass: 'text-center',-->
                    <!--dataClass: 'text-center'-->
                <!--}-->
            <!--],-->
            <!--css: {-->
                <!--table: {-->
                    <!--tableClass: 'table table-bordered table-striped table-hover',-->
                    <!--ascendingIcon: 'glyphicon glyphicon-chevron-up',-->
                    <!--descendingIcon: 'glyphicon glyphicon-chevron-down'-->
                <!--},-->
                <!--pagination: {-->
                    <!--wrapperClass: 'pagination',-->
                    <!--activeClass: 'active',-->
                    <!--disabledClass: 'disabled',-->
                    <!--pageClass: 'page',-->
                    <!--linkClass: 'link',-->
                    <!--icons: {-->
                        <!--first: '',-->
                        <!--prev: '',-->
                        <!--next: '',-->
                        <!--last: '',-->
                    <!--},-->
                <!--},-->
                <!--icons: {-->
                    <!--first: 'glyphicon glyphicon-step-backward',-->
                    <!--prev: 'glyphicon glyphicon-chevron-left',-->
                    <!--next: 'glyphicon glyphicon-chevron-right',-->
                    <!--last: 'glyphicon glyphicon-step-forward',-->
                <!--},-->
            <!--},-->
            <!--sortOrder: [-->
                <!--{ field: 'email', sortField: 'email', direction: 'asc'}-->
            <!--],-->
            <!--moreParams: {}-->
        <!--}-->
    <!--},-->
    <!--methods: {-->


        <!--onPaginationData (paginationData) {-->
            <!--this.$refs.pagination.setPaginationData(paginationData)-->
            <!--this.$refs.paginationInfo.setPaginationData(paginationData)-->
        <!--},-->
        <!--onChangePage (page) {-->
            <!--this.$refs.vuetable.changePage(page)-->
        <!--},-->
        <!--onCellClicked (data, field, event) {-->
            <!--console.log('cellClicked: ', field.name)-->
            <!--this.$refs.vuetable.toggleDetailRow(data.id)-->
        <!--},-->
    <!--},-->
    <!--events: {-->
<!--//        'filter-set' (filterText) {-->
<!--//            this.moreParams = {-->
<!--//                filter: filterText-->
<!--//            }-->
<!--//            Vue.nextTick( () => this.$refs.vuetable.refresh() )-->
<!--//        },-->
<!--//        'filter-reset' () {-->
<!--//            this.moreParams = {}-->
<!--//            Vue.nextTick( () => this.$refs.vuetable.refresh() )-->
<!--//        }-->
    <!--}-->
<!--}-->
<!--</script>-->

<template>
    <vuetable ref="vuetable"
              api-url="/getData"
              :fields="['name', 'email', 'is_admin','/is-active']"
    ></vuetable>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable'

    export default {
        components: {
            Vuetable
        }
    }
</script>