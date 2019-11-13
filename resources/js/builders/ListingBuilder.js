import Listing from "../components/base/list/Listing";

export default class ListingBuilder {

  constructor(endpoint) {
    this.props = {}
    this.endpoint = endpoint
  }

  withProvider(provider) {
    this.provider = provider
    return this
  }


  build() {

    let Provider = this.provider
    const props = this.props
    const endpoint = this.endpoint

    return {
      render(h) {
        return h(Provider, {
          props: {
            endpoint
          }
        }, [
          h(Listing, {
            props
          })
        ])
      }
    }




  }

}