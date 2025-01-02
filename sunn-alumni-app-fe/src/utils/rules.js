export const rules = {
  required: (value) => !!value || 'This field is required.',
  email: (value) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return emailRegex.test(value) || 'Enter a valid email address.'
  },
  number: (value) => !isNaN(value) || 'Enter a valid number.',
  minLength: (min) => (value) =>
    (value && value.length >= min) || `Minimum length is ${min} characters.`,
  maxLength: (max) => (value) =>
    (value && value.length <= max) || `Maximum length is ${max} characters.`,
  custom: (validatorFn, errorMessage) => (value) => validatorFn(value) || errorMessage,
}
