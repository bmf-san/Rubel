var tabdown = require('./tabdown');

function converStrToTree(dependenciesTextTree) {
  var lines = dependenciesTextTree.toString().split('\n') || [];
  var newLines = dependenciesTextTree.toString().split('\n')
  .map(function (line) {
    return line.replace(/\u001b\[0m/g, '');
  })
  .filter(function (line) {
    if (line.indexOf('[info] ') === 0 && line.indexOf('+-') > -1) {
      return true;
    }
    var match = line.match(/\[info\]\s[\w_\.\-]+:[\w_\.\-]+:[\w_\.\-]+/);
    if (match && match[0].length === line.length) {
      return true;
    }
    match = line.match(/\[info\]\s[\w_\.\-]+:[\w_\.\-]+:[\w_\.\-]+\s\[S\]/);
    if (match && match[0].length === line.length) {
      return true;
    }
    return false;
  })
  .map(function (line) {
    return line
    .slice(7, line.length) // slice off '[info] '
    .replace(' [S]', '')
    .replace(/\|/g, ' ')
    .replace('+-', '')
    .replace(/\s\s/g, '\t');
  });
  var tree = tabdown.parse(newLines, '\t');
  return tree;
}

function walkInTree(toNode, fromNode, parentNode) {
  if (!toNode.from) {
    toNode.from = [];
  }

  toNode.from.splice(0, 0, toNode.name + '@' + toNode.version);
  if (parentNode) {
    toNode.from = parentNode.from.concat(toNode.from);
  }

  if (fromNode.children && fromNode.children.length > 0) {
    for (var j = 0; j < fromNode.children.length; j++) {
      if (fromNode.children[j].data.indexOf('php') === -1) {
        var externalNode = getPackageNameAndVersion(
          fromNode.children[j].data);
        if (externalNode) {
          var coords = externalNode.name.split(':');
          var newNode = {
            groupId: coords[0],
            artifactId: coords[1],
            version: externalNode.version,
            name: externalNode.name,
            dependencies: [],
            from: [],
          };
          toNode.dependencies.push(newNode);
          walkInTree(toNode.dependencies[toNode.dependencies.length - 1],
            fromNode.children[j],
            toNode);
        }
      }
    }
  }
  delete toNode.parent;
}

function getPackageNameAndVersion(packageDependency) {
  var splited, version, app;
  if (packageDependency.indexOf('(evicted by:') > -1) {
    return null;
  }
  splited = packageDependency.split(':');
  version = splited[splited.length - 1];
  app = splited[0] + ':' + splited[1];
  app = app.split('\t').join('');
  app = app.trim();
  version = version.trim();
  return { name: app, version: version };
}

function convertDepArrayToObject(depsArr) {
  if (!depsArr) {
    return null;
  }
  return depsArr.reduce(function (acc, dep) {
    dep.dependencies = convertDepArrayToObject(dep.dependencies);
    acc[dep.name] = dep;
    return acc;
  }, {});
}

function parseError(text) {
  if (text.indexOf('Not a valid command: dependency-tree') !== -1) {
    return new Error('Error: Missing plugin `sbt-dependency-graph` ' +
      '(https://github.com/jrudolph/sbt-dependency-graph).\n' +
      'Please install it globally or on the current project and try again.');
  }
}

function parse(text, name, version) {
  var tree = converStrToTree(text);
  var snykTree = {
    name: name,
    version: version,
    dependencies: [],
  };
  walkInTree(snykTree, tree);
  snykTree.dependencies = convertDepArrayToObject(snykTree.dependencies);
  return snykTree;
}

module.exports = {
  parse: parse,
  parseError: parseError,
};
