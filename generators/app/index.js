'use strict';
const Generator = require('yeoman-generator');
const chalk = require('chalk');
const yosay = require('yosay');

module.exports = class extends Generator {
  prompting() {
    // Have Yeoman greet the user.
    this.log(yosay(
      'Welcome to the ' + chalk.red('polymer-redux') + ' generator!'
    ));

    const prompts = [{
      type: 'input',
      name: 'model',
      message: "What's the model name? (one-word smallcase ex. article)",
      default: this.appname
    }];

    return this.prompt(prompts).then(props => {
      // To access props later use this.props.someAnswer;
      this.props = props;
    });
  }

  writing() {
    this.fs.copyTpl(
      this.templatePath('reducer.tpl.php'),
      this.destinationPath(this.props.model + '/reducer.html'),
      {
        model: this.props.model,
        model_UPPERCASE: this.props.model.toUpperCase(),
      }
    )
  }

  install() {
    this.log('Done!');
  }
};
