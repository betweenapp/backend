<template>
  <div class="list">
    <b-card v-if="Object.keys(list).length">
      <template v-slot:header>
        <div class="list-header row align-items-center">
          <div class="list-title col-md-4">
            <h4 class="mb-0">{{ list.title }}</h4>
          </div>
          <div class="list-actions d-flex justify-content-end col-md-8">
            <button class="btn btn-primary">New Record</button>
          </div>
        </div>
      </template>

      <div class="list-filters">
        Filters are going here
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead>
          <tr>
            <th v-for="column in columns">
              <span @click="sortBy( column )"> {{ column.label }} </span>
            </th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="record in records" :key="record.id">
            <td v-for="column in columns">
              {{ record[column.field] }}
            </td>
          </tr>
          </tbody>
        </table>
      </div>

    </b-card>



  </div>
</template>

<script>
import ApiService from "../../../services/api.service"

export default {
  props: {
    endpoint: {
      type: String,
      required: true
    }
  },
  name: 'BaseListIndex',

  data() {

    return {
      fetchDefinition: true,
      perspective: 'index',
      list: {},
      records: [],
      meta: {},
    }

  },

  computed: {

    columns() {
      return this.list.columns.filter((column) => {
        return !column.hidden
      })
    }

  },

  mounted() {
    this.fetchList()
  },

  methods: {

    sortBy(column) {
      const sortKey = column.sortKey ? column.sortKey : column.field

      if (sortKey !== this.list.sort.key ) {
        this.list.sort.order ='asc'
      }  else {
        this.list.sort.order = this.list.sort.order === 'desc' ? 'asc' : 'desc'
      }

      this.list.sort.key = sortKey
      this.moveToPage(1)
    },

    moveToPage(page) {

      this.meta.current_page = page
      this.fetchList()

    },

    async fetchList() {

      const requestData = {
        method: 'GET',
        url: this.endpoint,
        params: {
          definition: this.fetchDefinition,
          perspective: this.perspective,
          page: this.meta.current_page ? this.meta.current_page : null,
          'sort[key]' : this.list.sort ? this.list.sort.key : null,
          'sort[order]' : this.list.sort ? this.list.sort.order : null,
        }
      }

      try {
        const response = await ApiService.customRequest(requestData)

        if (response.data.list) {
          this.list = response.data.list;
          this.fetchDefinition = false
        }

        this.records = response.data.data.records
        this.meta = response.data.meta


      } catch (e) {
        console.log(e)
      }

    }

  }

}
</script>

<style scoped>

</style>
