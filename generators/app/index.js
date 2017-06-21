'use strict';
const Generator = require('yeoman-generator');
const chalk = require('chalk');
const yosay = require('yosay');

module.exports = class extends Generator {
  constructor(args, opts) {
    super(args, opts);

    this.argument('model', { type: String, required: false });
  }

  prompting() {
    // Have Yeoman greet the user.
    this.log(yosay(
      'Welcome to the ' + chalk.red('polymer-redux') + ' generator!'
    ));

    const prompts = [{
      type: 'input',
      name: 'model',
      message: "What's the model name? (one-word smallcase ex. article)",
      default: this.options.model ? this.options.model : this.appname
    }];

    if(!this.options.model) {
      return this.prompt(prompts).then(props => {
        this.options = props;
      });
    }
  }

  writing() {
    const data = {
      model: this.options.model,
      model_UPPERCASE: this.options.model.toUpperCase(),
      model_Capitalize: [...this.options.model].map((x, i) => i === 0 ? x.toUpperCase() : x ).join('')
    };

    this.fs.copyTpl(
      this.templatePath('reducer.tpl.php'),
      this.destinationPath(this.options.model + '/reducer.html'), data
    )

    this.fs.copyTpl(
      this.templatePath('selectors.tpl.php'),
      this.destinationPath(this.options.model + '/selectors.html'), data
    )

    this.fs.copyTpl(
      this.templatePath('actions.tpl.php'),
      this.destinationPath(this.options.model + '/actions.html'), data
    )
  }

  install() {
    this.log('Done.');
  }
};
