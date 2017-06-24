var path = require('path');
var subProcess = require('./sub-process');

module.exports = {
  inspect: inspect,
};

function inspect(root, targetFile, options) {
  if (!options) { options = {}; }
  var command = options.command || 'python';
  return Promise.all([
    getMetaData(command, root),
    getDependencies(command, root, targetFile, options.args),
  ])
  .then(function (result) {
    return {
      plugin: result[0],
      package: result[1],
    };
  });
}

function getMetaData(command, root) {
  return subProcess.execute(command, ['--version'], { cwd: root })
  .then(function (output) {
    return {
      name: 'snyk-python-plugin',
      runtime: output.replace('\n', ''),
    };
  });
}

function getDependencies(command, root, targetFile, args) {
  return subProcess.execute(
    command,
    buildArgs(targetFile, args),
    { cwd: root }
  )
  .then(function (output) {
    return JSON.parse(output);
  })
  .catch(function (error) {
    if (typeof error === 'string') {
      if (error.indexOf('Required package missing') !== -1) {
        throw new Error('Please run `pip install -r ' + targetFile + '`');
      }
      throw new Error(error);
    }
    throw error;
  });
}

function buildArgs(targetFile, extraArgs) {
  var args = [path.resolve(__dirname, '../plug/pip_resolve.py')];
  if (targetFile) { args.push(targetFile); }
  if (extraArgs) { args.push(extraArgs); }
  return args;
}
