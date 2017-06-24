from package import Package
from reqPackage import ReqPackage


class DistPackage(Package):
    """Wrapper class for pkg_resources.Distribution instances
      :param obj: pkg_resources.Distribution to wrap over
      :param req: optional ReqPackage object to associate this
                  DistPackage with. This is useful for displaying the
                  tree in reverse
    """

    def __init__(self, obj, req=None):
        super(DistPackage, self).__init__(obj)
        self.version_spec = None
        self.req = req

    def render_as_root(self, frozen):
        if not frozen:
            return '{0}=={1}'.format(self.project_name, self.version)
        else:
            return self.__class__.frozen_repr(self._obj)

    def render_as_branch(self, frozen):
        assert self.req is not None
        if not frozen:
            parent_ver_spec = self.req.version_spec
            parent_str = self.req.project_name
            if parent_ver_spec:
                parent_str += parent_ver_spec
            return (
                '{0}=={1} [requires: {2}]'
            ).format(self.project_name, self.version, parent_str)
        else:
            return self.render_as_root(frozen)

    def as_requirement(self):
        """Return a ReqPackage representation of this DistPackage"""
        return ReqPackage(self._obj.as_requirement(), dist=self)

    def as_required_by(self, req):
        """Return a DistPackage instance associated to a requirement
        This association is necessary for displaying the tree in
        reverse.
        :param ReqPackage req: the requirement to associate with
        :returns: DistPackage instance
        """
        return self.__class__(self._obj, req)

    def as_dict(self):
        return {'key': self.key,
                'package_name': self.project_name,
                'installed_version': self.version}
