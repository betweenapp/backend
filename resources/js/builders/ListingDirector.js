import ListingProvider from "../providers/ListingProvider";

export default class ListingDirector {
  constructor(builder) {
    this.builder = builder
  }

  makeListing() {
    return this.builder
      .withProvider(ListingProvider)
      .build()
  }

}