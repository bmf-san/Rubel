var fs = require('fs');
var path = require('path');
var test = require('tap-only');
var plugin = require('../../lib');

test('run inspect()', function (t) {
  t.plan(1);
  return plugin.inspect(path.join(
    __dirname, '..', 'fixtures', 'testproj'),
    'build.sbt')
  .then(function (result) {
    t.equal(result.package
      .dependencies['com.example:hello_2.12']
      .dependencies['axis:axis']
      .dependencies['axis:axis-jaxrpc']
      .dependencies['org.apache.axis:axis-jaxrpc'].version,
      '1.4',
      'correct version found');
  });
});

test('run inspect() with no sbt plugin', function (t) {
  t.plan(1);
  return plugin.inspect(path.join(
    __dirname, '..', 'fixtures', 'testproj-noplugin'),
    'build.sbt')
  .catch(function (result) {
    t.pass('Error thrown correctly');
  });
});
