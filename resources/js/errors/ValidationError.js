class ValidationError extends Error {

  constructor(errorCode, message, errors) {
    super(message)
    this.name = this.constructor.name
    this.message = message
    this.errorCode = errorCode
    this.errors = errors
  }

}

export { ValidationError }
