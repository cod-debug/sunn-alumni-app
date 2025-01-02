// src/boot/rules.js
import { rules } from 'src/utils/rules';

export default ({ app }) => {
  app.config.globalProperties.$rules = rules;
};