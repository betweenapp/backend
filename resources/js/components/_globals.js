import Vue from 'vue'
import upperFirst from 'lodash/upperFirst'
import camelCase from 'lodash/camelCase'

const requireComponent = require.context(
    './base', true, /[\w]+\.vue$/
)

requireComponent.keys().forEach(fileName => {
    //Get component config
    const componentConfig = requireComponent(fileName)


    //Get PascalCase name of component
    const componentName = 'Base' + upperFirst(
      camelCase(fileName.replace(/^\.\//, '').replace(/\.\w+$/, ''))
    )

    //console.log(fileName, componentName, componentConfig.default)

    //Register component globally
    Vue.component(componentName, componentConfig.default || componentConfig)


});
