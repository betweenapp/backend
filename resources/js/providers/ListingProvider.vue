<script>
import ApiService from "../services/api.service";

export default {
  props: {
    endpoint: {
      type: String,
      required: true,
    }
  },
  name: "ListingProvider",

  data() {
    return {
      fetchDefinition: true,
      perspective: 'index',
    }
  },

  provide() {

    return {
      fetch: this.fetch
    }



  },

  methods: {

    async fetch(page, sort) {

      const requestData = {
        method: 'GET',
        url: this.endpoint,
        params: {
          definition: this.fetchDefinition,
          perspective: this.perspective,
          page,
          'sort[key]' : sort ? sort.key : null,
          'sort[order]' : sort ? sort.order : null,
        }
      }

      try {
        const response = await ApiService.customRequest(requestData)
        if (response.data.list) {
          //this.list = response.data.list;
          this.fetchDefinition = false
        }

        //this.records = response.data.data.records
        //this.meta = response.data.meta
        return  response.data;

      } catch (e) {
        console.log(e)
      }

    }

  },

  render() {
    return this.$slots.default
  }
}
</script>
