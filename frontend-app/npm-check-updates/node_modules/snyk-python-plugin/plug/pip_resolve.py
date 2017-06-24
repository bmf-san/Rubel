import sys
import os
import argparse
import json
import requirements
import pip
import pkg_resources
import utils


def create_tree_of_packages_dependencies(dist_tree, packages_names, req_file_path):
    """Create packages dependencies tree
    :param dict tree: the package tree
    :param set packages_names: set of select packages to be shown in the output.
    :param req_file_path: the path to requirements.txt file
    :rtype: dict
    """
    DEPENDENCIES = 'dependencies'
    FROM = 'from'
    VERSION = 'version'
    NAME = 'name'
    VERSION_SEPARATOR = '@'
    DIR_VERSION = '0.0.0'
    PACKAGE_FORMAT_VERSION = 'packageFormatVersion'

    tree = utils.sorted_tree(dist_tree)
    nodes = tree.keys()
    key_tree = dict((k.key, v) for k, v in tree.items())

    def get_children(n): return key_tree.get(n.key, [])
    packages_as_dist_obj = [
        p for p in nodes if p.key in packages_names or p.project_name in packages_names]

    def create_children_recursive(root_package, key_tree):
        children_packages_as_dist = key_tree[root_package[NAME].lower()]
        for child_dist in children_packages_as_dist:
            child_package = {NAME: child_dist.project_name, VERSION: child_dist.installed_version,
                             FROM: root_package[FROM] +
                             [child_dist.key + VERSION_SEPARATOR +
                              child_dist.installed_version]}
            create_children_recursive(child_package, key_tree)
            root_package[DEPENDENCIES] = {
                child_dist.project_name: child_package}
        return root_package

    def create_dir_as_root():
        name = os.path.basename(os.path.dirname(os.path.abspath(req_file_path)))
        dir_as_root = { NAME: name, VERSION: DIR_VERSION,
                       FROM: [name + VERSION_SEPARATOR + DIR_VERSION], DEPENDENCIES: {},
                       PACKAGE_FORMAT_VERSION: 'pip:0.0.1'}
        return dir_as_root

    def create_package_as_root(package, dir_as_root):
        package_as_root = {NAME: package.project_name.lower(), VERSION: package._obj._version,
                           FROM: ["{}{}{}".format(dir_as_root[NAME], VERSION_SEPARATOR, dir_as_root[VERSION])] +
                           ["{}{}{}".format(package.project_name.lower(),
                                            VERSION_SEPARATOR, package._obj._version)]}
        return package_as_root
    dir_as_root = create_dir_as_root()
    for package in packages_as_dist_obj:
        package_as_root = create_package_as_root(package, dir_as_root)
        package_tree = create_children_recursive(package_as_root, key_tree)
        dir_as_root[DEPENDENCIES][package_as_root[NAME]] = package_tree
    return dir_as_root


def create_dependencies_tree_by_req_file_path(requirements_file_path):
    # get all installed packages
    pkgs = pip.get_installed_distributions(local_only=False, skip=[])

    # get all installed packages's distribution object
    dist_index = utils.build_dist_index(pkgs)

    # get all installed distributions tree
    dist_tree = utils.construct_tree(dist_index)

    # open the requirements.txt file and create dependencies tree out of it
    with open(requirements_file_path, 'r') as requirements_file:
        req_list = list(requirements.parse(requirements_file))
        required = [req.name for req in req_list]
        installed = [p for p in dist_index]
        for r in required:
            if r.lower() not in installed:
                sys.exit('Required package missing')
        package_tree = create_tree_of_packages_dependencies(
            dist_tree, [req.name for req in req_list], requirements_file_path)
    print(json.dumps(package_tree))


if __name__ == '__main__':
    if(not sys.argv[1]):
        print('Expecting requirements.txt Path An Argument')
    sys.exit(create_dependencies_tree_by_req_file_path(sys.argv[1]))
