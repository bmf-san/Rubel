var fs = require('fs');
var path = require('path');
var test = require('tap-only');
var parse = require('../../lib/parse-mvn');

test('compare full results - without --dev', function (t) {
  t.plan(1);
  var mavenOutput = fs.readFileSync(path.join(
    __dirname, '..','fixtures', 'maven-dependency-tree-output.txt'), 'utf8');
  var depTree = parse(mavenOutput, false);
  var results = require(path.join(
    __dirname, '..', 'fixtures', 'maven-parse-results.json'));

  t.same(depTree, results);
});

test('compare full results - with --dev', function (t) {
  t.plan(1);
  var mavenOutput = fs.readFileSync(path.join(
    __dirname, '..', 'fixtures', 'maven-dependency-tree-output.txt'), 'utf8');
  var depTree = parse(mavenOutput, true);
  var results = require(path.join(
    __dirname, '..', 'fixtures', 'maven-parse-dev-results.json'));

  t.same(depTree, results);
});
