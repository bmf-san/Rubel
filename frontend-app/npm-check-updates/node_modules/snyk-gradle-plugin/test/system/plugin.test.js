var fs = require('fs');
var path = require('path');
var test = require('tap-only');
var plugin = require('../../lib');

test('run inspect()', function (t) {
  t.plan(1);
  return plugin.inspect('.', path.join(
    __dirname, '..', 'fixtures', 'build.gradle'))
  .then(function (result) {
    t.equal(result.package
      .dependencies['com.android.tools.build:builder']
      .dependencies['com.android.tools:sdklib']
      .dependencies['com.android.tools:repository']
      .dependencies['com.android.tools:common']
      .dependencies['com.android.tools:annotations'].version,
      '25.3.0',
      'correct version found');
  });
});
