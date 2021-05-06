<?php return array (
  'openapi' => '3.0.2',
  'info' => 
  array (
    'description' => 'API access to your community.',
    'title' => 'Vanilla API',
    'version' => '2.0-alpha',
  ),
  'paths' => 
  array (
    '/addons' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The type of addon.',
            'in' => 'query',
            'name' => 'type',
            'schema' => 
            array (
              'enum' => 
              array (
                0 => 'addon',
                1 => 'theme',
                2 => 'locale',
              ),
              'type' => 'string',
            ),
          ),
          1 => 
          array (
            'description' => 'Filter enabled or disabled addons.
',
            'in' => 'query',
            'name' => 'enabled',
            'schema' => 
            array (
              'type' => 'boolean',
            ),
          ),
          2 => 
          array (
            'description' => 'Which theme to show the enabled status for.
',
            'in' => 'query',
            'name' => 'themeType',
            'schema' => 
            array (
              'type' => 'string',
              'default' => 'desktop',
              'enum' => 
              array (
                0 => 'desktop',
                1 => 'mobile',
              ),
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Addon',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Addons',
        ),
        'summary' => 'List addons.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/addons/{addonID}' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The ID of the addon.
',
            'in' => 'path',
            'name' => 'addonID',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
          1 => 
          array (
            'description' => 'Which theme to show the enabled status for.
',
            'in' => 'query',
            'name' => 'themeType',
            'schema' => 
            array (
              'type' => 'string',
              'default' => 'desktop',
              'enum' => 
              array (
                0 => 'desktop',
                1 => 'mobile',
              ),
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Addon',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Addons',
        ),
        'summary' => 'Get an addon.',
        'x-addon' => 'dashboard',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The ID of the addon.',
            'in' => 'path',
            'name' => 'addonID',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Addon',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Addons',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'enabled' => 
                  array (
                    'description' => 'Enable or disable the addon.',
                    'type' => 'boolean',
                  ),
                  'themeType' => 
                  array (
                    'type' => 'string',
                    'default' => 'desktop',
                    'description' => 'Which theme type to set.',
                    'enum' => 
                    array (
                      0 => 'desktop',
                      1 => 'mobile',
                    ),
                  ),
                ),
                'required' => 
                array (
                  0 => 'enabled',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Enable or disable an addon.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/categories' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Parent category ID.
',
            'in' => 'query',
            'name' => 'parentCategoryID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Parent category URL code.
',
            'in' => 'query',
            'name' => 'parentCategoryCode',
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
          2 => 
          array (
            'description' => 'Only list categories followed by the current user.
',
            'in' => 'query',
            'name' => 'followed',
            'required' => true,
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
          ),
          3 => 
          array (
            'description' => '

',
            'in' => 'query',
            'name' => 'maxDepth',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 2,
            ),
          ),
          4 => 
          array (
            'name' => 'archived',
            'description' => 'Filter by archived status of a category. True for archived only. False for no archived categories. Not compatible with followed filter.
',
            'in' => 'query',
            'required' => true,
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
            'allowEmptyValue' => true,
          ),
          5 => 
          array (
            'description' => 'Page number. Works with flat and followed categories. See <a rel="nofollow" href="https://docs.vanillaforums.com/apiv2/#pagination">Pagination</a>
',
            'in' => 'query',
            'name' => 'page',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 1,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          6 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'properties' => 
                    array (
                      'categoryID' => 
                      array (
                        'description' => 'The ID of the category.',
                        'type' => 'integer',
                      ),
                      'children' => 
                      array (
                        'items' => 
                        array (
                          'properties' => 
                          array (
                            'categoryID' => 
                            array (
                              'description' => 'The ID of the category.',
                              'type' => 'integer',
                            ),
                            'children' => 
                            array (
                              'items' => 
                              array (
                                'type' => 'string',
                              ),
                              'type' => 'array',
                            ),
                            'countAllComments' => 
                            array (
                              'description' => 'Total of all comments in a category and its children.',
                              'type' => 'integer',
                            ),
                            'countAllDiscussions' => 
                            array (
                              'description' => 'Total of all discussions in a category and its children.',
                              'type' => 'integer',
                            ),
                            'countCategories' => 
                            array (
                              'description' => 'Total number of child categories.',
                              'type' => 'integer',
                            ),
                            'countComments' => 
                            array (
                              'description' => 'Total comments in the category.',
                              'type' => 'integer',
                            ),
                            'countDiscussions' => 
                            array (
                              'description' => 'Total discussions in the category.',
                              'type' => 'integer',
                            ),
                            'customPermissions' => 
                            array (
                              'description' => 'Are custom permissions set for this category?',
                              'type' => 'boolean',
                            ),
                            'depth' => 
                            array (
                              'type' => 'integer',
                            ),
                            'description' => 
                            array (
                              'description' => 'The description of the category.',
                              'minLength' => 0,
                              'nullable' => true,
                              'type' => 'string',
                            ),
                            'displayAs' => 
                            array (
                              'type' => 'string',
                              'default' => 'discussions',
                              'description' => 'The display style of the category.',
                              'enum' => 
                              array (
                                0 => 'categories',
                                1 => 'discussions',
                                2 => 'flat',
                                3 => 'heading',
                              ),
                              'minLength' => 1,
                            ),
                            'followed' => 
                            array (
                              'description' => 'Is the category being followed by the current user?',
                              'type' => 'boolean',
                            ),
                            'isArchived' => 
                            array (
                              'description' => 'The archived state of this category.',
                              'type' => 'boolean',
                            ),
                            'name' => 
                            array (
                              'description' => 'The name of the category.',
                              'minLength' => 1,
                              'type' => 'string',
                            ),
                            'parentCategoryID' => 
                            array (
                              'description' => 'Parent category ID.',
                              'nullable' => true,
                              'type' => 'integer',
                            ),
                            'url' => 
                            array (
                              'description' => 'The URL to the category.',
                              'minLength' => 1,
                              'type' => 'string',
                            ),
                            'urlcode' => 
                            array (
                              'description' => 'The URL code of the category.',
                              'minLength' => 1,
                              'type' => 'string',
                            ),
                          ),
                          'required' => 
                          array (
                            0 => 'categoryID',
                            1 => 'name',
                            2 => 'description',
                            3 => 'parentCategoryID',
                            4 => 'customPermissions',
                            5 => 'isArchived',
                            6 => 'urlcode',
                            7 => 'url',
                            8 => 'displayAs',
                            9 => 'countCategories',
                            10 => 'countDiscussions',
                            11 => 'countComments',
                            12 => 'countAllDiscussions',
                            13 => 'countAllComments',
                            14 => 'depth',
                            15 => 'children',
                          ),
                          'type' => 'object',
                        ),
                        'type' => 'array',
                      ),
                      'countAllComments' => 
                      array (
                        'description' => 'Total of all comments in a category and its children.',
                        'type' => 'integer',
                      ),
                      'countAllDiscussions' => 
                      array (
                        'description' => 'Total of all discussions in a category and its children.',
                        'type' => 'integer',
                      ),
                      'countCategories' => 
                      array (
                        'description' => 'Total number of child categories.',
                        'type' => 'integer',
                      ),
                      'countComments' => 
                      array (
                        'description' => 'Total comments in the category.',
                        'type' => 'integer',
                      ),
                      'countDiscussions' => 
                      array (
                        'description' => 'Total discussions in the category.',
                        'type' => 'integer',
                      ),
                      'customPermissions' => 
                      array (
                        'description' => 'Are custom permissions set for this category?',
                        'type' => 'boolean',
                      ),
                      'depth' => 
                      array (
                        'type' => 'integer',
                      ),
                      'description' => 
                      array (
                        'description' => 'The description of the category.',
                        'minLength' => 0,
                        'nullable' => true,
                        'type' => 'string',
                      ),
                      'displayAs' => 
                      array (
                        'type' => 'string',
                        'default' => 'discussions',
                        'description' => 'The display style of the category.',
                        'enum' => 
                        array (
                          0 => 'categories',
                          1 => 'discussions',
                          2 => 'flat',
                          3 => 'heading',
                        ),
                        'minLength' => 1,
                      ),
                      'followed' => 
                      array (
                        'description' => 'Is the category being followed by the current user?',
                        'type' => 'boolean',
                      ),
                      'isArchived' => 
                      array (
                        'description' => 'The archived state of this category.',
                        'type' => 'boolean',
                      ),
                      'name' => 
                      array (
                        'description' => 'The name of the category.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'parentCategoryID' => 
                      array (
                        'description' => 'Parent category ID.',
                        'nullable' => true,
                        'type' => 'integer',
                      ),
                      'url' => 
                      array (
                        'description' => 'The URL to the category.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'urlcode' => 
                      array (
                        'description' => 'The URL code of the category.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'categoryID',
                      1 => 'name',
                      2 => 'description',
                      3 => 'parentCategoryID',
                      4 => 'customPermissions',
                      5 => 'isArchived',
                      6 => 'urlcode',
                      7 => 'url',
                      8 => 'displayAs',
                      9 => 'countCategories',
                      10 => 'countDiscussions',
                      11 => 'countComments',
                      12 => 'countAllDiscussions',
                      13 => 'countAllComments',
                      14 => 'depth',
                    ),
                    'type' => 'object',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'summary' => 'List categories.',
        'x-addon' => 'vanilla',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'categoryID' => 
                    array (
                      'description' => 'The ID of the category.',
                      'type' => 'integer',
                    ),
                    'countAllComments' => 
                    array (
                      'description' => 'Total of all comments in a category and its children.',
                      'type' => 'integer',
                    ),
                    'countAllDiscussions' => 
                    array (
                      'description' => 'Total of all discussions in a category and its children.',
                      'type' => 'integer',
                    ),
                    'countCategories' => 
                    array (
                      'description' => 'Total number of child categories.',
                      'type' => 'integer',
                    ),
                    'countComments' => 
                    array (
                      'description' => 'Total comments in the category.',
                      'type' => 'integer',
                    ),
                    'countDiscussions' => 
                    array (
                      'description' => 'Total discussions in the category.',
                      'type' => 'integer',
                    ),
                    'customPermissions' => 
                    array (
                      'description' => 'Are custom permissions set for this category?',
                      'type' => 'boolean',
                    ),
                    'description' => 
                    array (
                      'description' => 'The description of the category.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'displayAs' => 
                    array (
                      'type' => 'string',
                      'default' => 'discussions',
                      'description' => 'The display style of the category.',
                      'enum' => 
                      array (
                        0 => 'categories',
                        1 => 'discussions',
                        2 => 'flat',
                        3 => 'heading',
                      ),
                      'minLength' => 1,
                    ),
                    'followed' => 
                    array (
                      'description' => 'Is the category being followed by the current user?',
                      'type' => 'boolean',
                    ),
                    'isArchived' => 
                    array (
                      'description' => 'The archived state of this category.',
                      'type' => 'boolean',
                    ),
                    'name' => 
                    array (
                      'description' => 'The name of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'parentCategoryID' => 
                    array (
                      'description' => 'Parent category ID.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL to the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'urlcode' => 
                    array (
                      'description' => 'The URL code of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'categoryID',
                    1 => 'name',
                    2 => 'description',
                    3 => 'parentCategoryID',
                    4 => 'customPermissions',
                    5 => 'isArchived',
                    6 => 'urlcode',
                    7 => 'url',
                    8 => 'displayAs',
                    9 => 'countCategories',
                    10 => 'countDiscussions',
                    11 => 'countComments',
                    12 => 'countAllDiscussions',
                    13 => 'countAllComments',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'requestBody' => 
        array (
          '$ref' => '#/components/requestBodies/CategoryPost',
        ),
        'summary' => 'Add a category.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/categories/search' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Category name filter.
',
            'in' => 'query',
            'name' => 'query',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
          1 => 
          array (
            'description' => 'Page number. See [Pagination](https://docs.vanillaforums.com/apiv2/#pagination).
',
            'in' => 'query',
            'name' => 'page',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 1,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          2 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 200,
              'minimum' => 1,
            ),
          ),
          3 => 
          array (
            'description' => 'Expand associated records using one or more valid field names (all, parent, breadcrumbs).
A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'oneOf' => 
              array (
                0 => 
                array (
                  'type' => 'array',
                ),
                1 => 
                array (
                  'type' => 'boolean',
                ),
              ),
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'breadcrumbs',
                  1 => 'parent',
                  2 => 'all',
                ),
                'type' => 'string',
              ),
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'properties' => 
                    array (
                      'categoryID' => 
                      array (
                        'description' => 'The ID of the category.',
                        'type' => 'integer',
                      ),
                      'countAllComments' => 
                      array (
                        'description' => 'Total of all comments in a category and its children.',
                        'type' => 'integer',
                      ),
                      'countAllDiscussions' => 
                      array (
                        'description' => 'Total of all discussions in a category and its children.',
                        'type' => 'integer',
                      ),
                      'countCategories' => 
                      array (
                        'description' => 'Total number of child categories.',
                        'type' => 'integer',
                      ),
                      'countComments' => 
                      array (
                        'description' => 'Total comments in the category.',
                        'type' => 'integer',
                      ),
                      'countDiscussions' => 
                      array (
                        'description' => 'Total discussions in the category.',
                        'type' => 'integer',
                      ),
                      'customPermissions' => 
                      array (
                        'description' => 'Are custom permissions set for this category?',
                        'type' => 'boolean',
                      ),
                      'description' => 
                      array (
                        'description' => 'The description of the category.',
                        'minLength' => 0,
                        'nullable' => true,
                        'type' => 'string',
                      ),
                      'displayAs' => 
                      array (
                        'type' => 'string',
                        'default' => 'discussions',
                        'description' => 'The display style of the category.',
                        'enum' => 
                        array (
                          0 => 'categories',
                          1 => 'discussions',
                          2 => 'flat',
                          3 => 'heading',
                        ),
                        'minLength' => 1,
                      ),
                      'followed' => 
                      array (
                        'description' => 'Is the category being followed by the current user?',
                        'type' => 'boolean',
                      ),
                      'isArchived' => 
                      array (
                        'description' => 'The archived state of this category.',
                        'type' => 'boolean',
                      ),
                      'name' => 
                      array (
                        'description' => 'The name of the category.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'parentCategoryID' => 
                      array (
                        'description' => 'Parent category ID.',
                        'nullable' => true,
                        'type' => 'integer',
                      ),
                      'url' => 
                      array (
                        'description' => 'The URL to the category.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'urlcode' => 
                      array (
                        'description' => 'The URL code of the category.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'breadcrumbs' => 
                      array (
                        'items' => 
                        array (
                          'properties' => 
                          array (
                            'name' => 
                            array (
                              'description' => 'Breadcrumb element name.',
                              'minLength' => 1,
                              'type' => 'string',
                            ),
                            'url' => 
                            array (
                              'description' => 'Breadcrumb element url.',
                              'minLength' => 1,
                              'type' => 'string',
                            ),
                          ),
                          'required' => 
                          array (
                            0 => 'name',
                            1 => 'url',
                          ),
                          'type' => 'object',
                        ),
                        'type' => 'array',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'categoryID',
                      1 => 'name',
                      2 => 'description',
                      3 => 'parentCategoryID',
                      4 => 'customPermissions',
                      5 => 'isArchived',
                      6 => 'urlcode',
                      7 => 'url',
                      8 => 'displayAs',
                      9 => 'countCategories',
                      10 => 'countDiscussions',
                      11 => 'countComments',
                      12 => 'countAllDiscussions',
                      13 => 'countAllComments',
                    ),
                    'type' => 'object',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'summary' => 'Search categories.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/categories/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The category ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'summary' => 'Delete a category.',
        'x-addon' => 'vanilla',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The category ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'categoryID' => 
                    array (
                      'description' => 'The ID of the category.',
                      'type' => 'integer',
                    ),
                    'countAllComments' => 
                    array (
                      'description' => 'Total of all comments in a category and its children.',
                      'type' => 'integer',
                    ),
                    'countAllDiscussions' => 
                    array (
                      'description' => 'Total of all discussions in a category and its children.',
                      'type' => 'integer',
                    ),
                    'countCategories' => 
                    array (
                      'description' => 'Total number of child categories.',
                      'type' => 'integer',
                    ),
                    'countComments' => 
                    array (
                      'description' => 'Total comments in the category.',
                      'type' => 'integer',
                    ),
                    'countDiscussions' => 
                    array (
                      'description' => 'Total discussions in the category.',
                      'type' => 'integer',
                    ),
                    'customPermissions' => 
                    array (
                      'description' => 'Are custom permissions set for this category?',
                      'type' => 'boolean',
                    ),
                    'description' => 
                    array (
                      'description' => 'The description of the category.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'displayAs' => 
                    array (
                      'type' => 'string',
                      'default' => 'discussions',
                      'description' => 'The display style of the category.',
                      'enum' => 
                      array (
                        0 => 'categories',
                        1 => 'discussions',
                        2 => 'flat',
                        3 => 'heading',
                      ),
                      'minLength' => 1,
                    ),
                    'followed' => 
                    array (
                      'description' => 'Is the category being followed by the current user?',
                      'type' => 'boolean',
                    ),
                    'isArchived' => 
                    array (
                      'description' => 'The archived state of this category.',
                      'type' => 'boolean',
                    ),
                    'name' => 
                    array (
                      'description' => 'The name of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'parentCategoryID' => 
                    array (
                      'description' => 'Parent category ID.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL to the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'urlcode' => 
                    array (
                      'description' => 'The URL code of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'categoryID',
                    1 => 'name',
                    2 => 'description',
                    3 => 'parentCategoryID',
                    4 => 'customPermissions',
                    5 => 'isArchived',
                    6 => 'urlcode',
                    7 => 'url',
                    8 => 'displayAs',
                    9 => 'countCategories',
                    10 => 'countDiscussions',
                    11 => 'countComments',
                    12 => 'countAllDiscussions',
                    13 => 'countAllComments',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'summary' => 'Get a category.',
        'x-addon' => 'vanilla',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The category ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'categoryID' => 
                    array (
                      'description' => 'The ID of the category.',
                      'type' => 'integer',
                    ),
                    'countAllComments' => 
                    array (
                      'description' => 'Total of all comments in a category and its children.',
                      'type' => 'integer',
                    ),
                    'countAllDiscussions' => 
                    array (
                      'description' => 'Total of all discussions in a category and its children.',
                      'type' => 'integer',
                    ),
                    'countCategories' => 
                    array (
                      'description' => 'Total number of child categories.',
                      'type' => 'integer',
                    ),
                    'countComments' => 
                    array (
                      'description' => 'Total comments in the category.',
                      'type' => 'integer',
                    ),
                    'countDiscussions' => 
                    array (
                      'description' => 'Total discussions in the category.',
                      'type' => 'integer',
                    ),
                    'customPermissions' => 
                    array (
                      'description' => 'Are custom permissions set for this category?',
                      'type' => 'boolean',
                    ),
                    'description' => 
                    array (
                      'description' => 'The description of the category.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'displayAs' => 
                    array (
                      'type' => 'string',
                      'default' => 'discussions',
                      'description' => 'The display style of the category.',
                      'enum' => 
                      array (
                        0 => 'categories',
                        1 => 'discussions',
                        2 => 'flat',
                        3 => 'heading',
                      ),
                      'minLength' => 1,
                    ),
                    'followed' => 
                    array (
                      'description' => 'Is the category being followed by the current user?',
                      'type' => 'boolean',
                    ),
                    'isArchived' => 
                    array (
                      'description' => 'The archived state of this category.',
                      'type' => 'boolean',
                    ),
                    'name' => 
                    array (
                      'description' => 'The name of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'parentCategoryID' => 
                    array (
                      'description' => 'Parent category ID.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL to the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'urlcode' => 
                    array (
                      'description' => 'The URL code of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'categoryID',
                    1 => 'name',
                    2 => 'description',
                    3 => 'parentCategoryID',
                    4 => 'customPermissions',
                    5 => 'isArchived',
                    6 => 'urlcode',
                    7 => 'url',
                    8 => 'displayAs',
                    9 => 'countCategories',
                    10 => 'countDiscussions',
                    11 => 'countComments',
                    12 => 'countAllDiscussions',
                    13 => 'countAllComments',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/CategoryPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a category.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/categories/{id}/edit' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The category ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'categoryID' => 
                    array (
                      'description' => 'The ID of the category.',
                      'type' => 'integer',
                    ),
                    'description' => 
                    array (
                      'description' => 'The description of the category.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'displayAs' => 
                    array (
                      'type' => 'string',
                      'default' => 'discussions',
                      'description' => 'The display style of the category.',
                      'enum' => 
                      array (
                        0 => 'categories',
                        1 => 'discussions',
                        2 => 'flat',
                        3 => 'heading',
                      ),
                      'minLength' => 1,
                    ),
                    'name' => 
                    array (
                      'description' => 'The name of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'parentCategoryID' => 
                    array (
                      'description' => 'Parent category ID.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'urlcode' => 
                    array (
                      'description' => 'The URL code of the category.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'categoryID',
                    1 => 'name',
                    2 => 'parentCategoryID',
                    3 => 'urlcode',
                    4 => 'description',
                    5 => 'displayAs',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'summary' => 'Get a category for editing.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/categories/{id}/follow' => 
    array (
      'put' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'followed' => 
                    array (
                      'description' => 'The category-follow status for the current user.',
                      'type' => 'boolean',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'followed',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Categories',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'followed' => 
                  array (
                    'description' => 'The category-follow status for the current user.',
                    'type' => 'boolean',
                  ),
                ),
                'required' => 
                array (
                  0 => 'followed',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            '$ref' => '#/components/parameters/DateInserted',
          ),
          1 => 
          array (
            '$ref' => '#/components/parameters/DateUpdated',
          ),
          2 => 
          array (
            'description' => 'The discussion ID.
',
            'in' => 'query',
            'name' => 'discussionID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          3 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          4 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => '30',
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          5 => 
          array (
            'description' => 'Filter by author.
',
            'in' => 'query',
            'name' => 'insertUserID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          6 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'insertUser',
                  1 => 'all',
                  2 => 'reactions',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Comment',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'summary' => 'List comments.',
        'x-addon' => 'vanilla',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Comment',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'requestBody' => 
        array (
          '$ref' => '#/components/requestBodies/CommentPost',
        ),
        'summary' => 'Add a comment.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments/search' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The numeric ID of a category.
',
            'in' => 'query',
            'name' => 'categoryID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Search terms.
',
            'in' => 'query',
            'name' => 'query',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
          2 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          3 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          4 => 
          array (
            'description' => 'Expand associated records.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Comment',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'summary' => 'Search comments.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The comment ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'summary' => 'Delete a comment.',
        'x-addon' => 'vanilla',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The comment ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Comment',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'summary' => 'Get a comment.',
        'x-addon' => 'vanilla',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The comment ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Comment',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/CommentPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a comment.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments/{id}/answer' => 
    array (
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Comment',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/CommentGet',
              ),
            ),
          ),
          'required' => true,
        ),
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments/{id}/edit' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The comment ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'body' => 
                    array (
                      'description' => 'The body of the comment.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'commentID' => 
                    array (
                      'description' => 'The ID of the comment.',
                      'type' => 'integer',
                    ),
                    'discussionID' => 
                    array (
                      'description' => 'The ID of the discussion.',
                      'type' => 'integer',
                    ),
                    'format' => 
                    array (
                      'description' => 'The input format of the comment.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'commentID',
                    1 => 'discussionID',
                    2 => 'body',
                    3 => 'format',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'summary' => 'Get a comment for editing.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments/{id}/quote' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The comment ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'bodyRaw' => 
                    array (
                      'description' => 'The raw body of the comment. This can be an array of rich operations or a string for other formats',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'commentID' => 
                    array (
                      'description' => 'The ID of the comment.',
                      'type' => 'integer',
                    ),
                    'dateInserted' => 
                    array (
                      'description' => 'When the comment was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'dateUpdated' => 
                    array (
                      'description' => 'When the comment was last updated.',
                      'format' => 'date-time',
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'format' => 
                    array (
                      'description' => 'The original format of the comment',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'insertUser' => 
                    array (
                      '$ref' => '#/components/schemas/UserFragment',
                    ),
                    'url' => 
                    array (
                      'description' => 'The full URL to the comment.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'commentID',
                    1 => 'bodyRaw',
                    2 => 'dateInserted',
                    3 => 'dateUpdated',
                    4 => 'insertUser',
                    5 => 'url',
                    6 => 'format',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments/{id}/reactions' => 
    array (
      'x-addon' => 'reactions',
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The comment ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
          2 => 
          array (
            'description' => 'Filter to a specific reaction type by using its URL code.
',
            'in' => 'query',
            'name' => 'type',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
            'allowEmptyValue' => true,
          ),
          3 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          4 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'properties' => 
                    array (
                      'dateInserted' => 
                      array (
                        'format' => 'date-time',
                        'type' => 'string',
                      ),
                      'reactionType' => 
                      array (
                        'properties' => 
                        array (
                          'class' => 
                          array (
                            'minLength' => 1,
                            'type' => 'string',
                          ),
                          'name' => 
                          array (
                            'minLength' => 1,
                            'type' => 'string',
                          ),
                          'tagID' => 
                          array (
                            'type' => 'integer',
                          ),
                          'urlcode' => 
                          array (
                            'minLength' => 1,
                            'type' => 'string',
                          ),
                        ),
                        'required' => 
                        array (
                          0 => 'tagID',
                          1 => 'urlcode',
                          2 => 'name',
                          3 => 'class',
                        ),
                        'type' => 'object',
                      ),
                      'recordID' => 
                      array (
                        'type' => 'integer',
                      ),
                      'recordType' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'tagID' => 
                      array (
                        'type' => 'integer',
                      ),
                      'user' => 
                      array (
                        '$ref' => '#/components/schemas/UserFragment',
                      ),
                      'userID' => 
                      array (
                        'type' => 'integer',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'recordType',
                      1 => 'recordID',
                      2 => 'tagID',
                      3 => 'userID',
                      4 => 'dateInserted',
                      5 => 'user',
                      6 => 'reactionType',
                    ),
                    'type' => 'object',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'summary' => 'Get reactions to a comment.',
        'x-addon' => 'vanilla',
      ),
      'post' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'properties' => 
                    array (
                      'class' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'count' => 
                      array (
                        'type' => 'integer',
                      ),
                      'name' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'tagID' => 
                      array (
                        'type' => 'integer',
                      ),
                      'urlcode' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'tagID',
                      1 => 'urlcode',
                      2 => 'name',
                      3 => 'class',
                      4 => 'count',
                    ),
                    'type' => 'object',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'reactionType' => 
                  array (
                    'description' => 'URL code of a reaction type.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'reactionType',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'React to a comment.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/comments/{id}/reactions/{userID}' => 
    array (
      'x-addon' => 'reactions',
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The comment ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'The target user ID.
',
            'in' => 'path',
            'name' => 'userID',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          2 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Comments',
        ),
        'summary' => 'Remove a user\'s reaction.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/conversations' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Filter by author.
',
            'in' => 'query',
            'name' => 'insertUserID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Filter by participating user. (Has no effect if insertUserID is used)
',
            'in' => 'query',
            'name' => 'participantUserID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          2 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          3 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 50,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          4 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'insertUser',
                  1 => 'lastInsertUser',
                  2 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Conversation',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Conversations',
        ),
        'summary' => 'List user conversations.',
        'x-addon' => 'conversations',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Conversation',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Conversations',
        ),
        'requestBody' => 
        array (
          '$ref' => '#/components/requestBodies/ConversationPost',
        ),
        'summary' => 'Add a conversation.',
        'x-addon' => 'conversations',
      ),
    ),
    '/conversations/{id}' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The conversation ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Conversation',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Conversations',
        ),
        'summary' => 'Get a conversation.',
        'x-addon' => 'conversations',
      ),
    ),
    '/conversations/{id}/leave' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The conversation ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Conversations',
        ),
        'summary' => 'Leave a conversation.',
        'x-addon' => 'conversations',
      ),
    ),
    '/conversations/{id}/participants' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The conversation ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Filter by participant status.
',
            'in' => 'query',
            'name' => 'status',
            'schema' => 
            array (
              'type' => 'string',
              'default' => 'participating',
              'enum' => 
              array (
                0 => 'all',
                1 => 'participating',
                2 => 'deleted',
              ),
            ),
          ),
          2 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          3 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 5,
              'maximum' => 100,
              'minimum' => 5,
            ),
          ),
          4 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'user',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ConversationParticipants',
                ),
              ),
            ),
            'description' => 'List of participants.',
          ),
        ),
        'tags' => 
        array (
          0 => 'Conversations',
        ),
        'summary' => 'Get participants of a conversation.',
        'x-addon' => 'conversations',
      ),
      'post' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The conversation ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ConversationParticipants',
                ),
              ),
            ),
            'description' => 'List of participants.',
          ),
        ),
        'tags' => 
        array (
          0 => 'Conversations',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/ConversationPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Add participants to a conversation.',
        'x-addon' => 'conversations',
      ),
    ),
    '/dashboard/menus' => 
    array (
      'get' => 
      array (
        'summary' => 'List the dashboard menus.',
        'description' => 'This endpoint returns the entire navigation structure of the dashboard. It has three levels:

1. The first level represents main menu sections.
2. Each section can be seperated into groups.
3. Groups contain the actual menu links.
',
        'tags' => 
        array (
          0 => 'Dashboard',
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'description' => 'Represents a main menu item.',
                    'type' => 'object',
                    'properties' => 
                    array (
                      'description' => 
                      array (
                        'description' => 'The menu description.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'groups' => 
                      array (
                        'items' => 
                        array (
                          'properties' => 
                          array (
                            'key' => 
                            array (
                              'description' => 'The key of the group.',
                              'minLength' => 1,
                              'type' => 'string',
                            ),
                            'links' => 
                            array (
                              'items' => 
                              array (
                                'properties' => 
                                array (
                                  'badge' => 
                                  array (
                                    'description' => 'Information about a badge to display beside the link.',
                                    'properties' => 
                                    array (
                                      'text' => 
                                      array (
                                        'description' => 'Literal text for the badge.',
                                        'minLength' => 1,
                                        'type' => 'string',
                                      ),
                                      'type' => 
                                      array (
                                        'description' => 'The type of badge.',
                                        'enum' => 
                                        array (
                                          0 => 'view',
                                          1 => 'text',
                                        ),
                                        'minLength' => 1,
                                        'type' => 'string',
                                      ),
                                      'url' => 
                                      array (
                                        'description' => 'The URL of a view.',
                                        'type' => 'string',
                                      ),
                                    ),
                                    'type' => 'object',
                                  ),
                                  'key' => 
                                  array (
                                    'description' => 'The key of the link.',
                                    'minLength' => 1,
                                    'type' => 'string',
                                  ),
                                  'name' => 
                                  array (
                                    'description' => 'The title of the link.',
                                    'minLength' => 1,
                                    'type' => 'string',
                                  ),
                                  'react' => 
                                  array (
                                    'description' => 'Whether or not the link represents a React component.',
                                    'type' => 'boolean',
                                  ),
                                  'url' => 
                                  array (
                                    'description' => 'The URL of the link.',
                                    'minLength' => 1,
                                    'type' => 'string',
                                  ),
                                ),
                                'required' => 
                                array (
                                  0 => 'name',
                                  1 => 'key',
                                  2 => 'url',
                                  3 => 'react',
                                ),
                                'type' => 'object',
                              ),
                              'type' => 'array',
                            ),
                            'name' => 
                            array (
                              'description' => 'The title of the group.',
                              'minLength' => 1,
                              'type' => 'string',
                            ),
                          ),
                          'required' => 
                          array (
                            0 => 'name',
                            1 => 'key',
                            2 => 'links',
                          ),
                          'type' => 'object',
                        ),
                        'type' => 'array',
                      ),
                      'key' => 
                      array (
                        'description' => 'The ID of the menu.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'name' => 
                      array (
                        'description' => 'The title of the menu.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'url' => 
                      array (
                        'description' => 'The URL to the menu if it doesn\'t have a submenu.',
                        'type' => 'string',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'name',
                      1 => 'key',
                      2 => 'description',
                      3 => 'groups',
                    ),
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/discussions' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Filter by a category.',
            'in' => 'query',
            'name' => 'categoryID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
            'x-filter' => 
            array (
              'field' => 'd.CategoryID',
            ),
          ),
          1 => 
          array (
            '$ref' => '#/components/parameters/DateInserted',
          ),
          2 => 
          array (
            '$ref' => '#/components/parameters/DateUpdated',
          ),
          3 => 
          array (
            'description' => 'Filter by discussion type.
',
            'in' => 'query',
            'name' => 'type',
            'schema' => 
            array (
              'type' => 'string',
            ),
            'x-filter' => 
            array (
              'field' => 'd.Type',
            ),
          ),
          4 => 
          array (
            'description' => 'Only fetch discussions from followed categories. Pinned discussions are mixed in.
',
            'in' => 'query',
            'name' => 'followed',
            'required' => true,
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
          ),
          5 => 
          array (
            'description' => 'Whether or not to include pinned discussions. If true, only return pinned discussions. Cannot be used with the pinOrder parameter.
',
            'in' => 'query',
            'name' => 'pinned',
            'schema' => 
            array (
              'type' => 'boolean',
            ),
          ),
          6 => 
          array (
            'description' => 'If including pinned posts, in what order should they be integrated? When "first", discussions pinned to a specific category will only be affected if the discussion\'s category is passed as the categoryID parameter. Cannot be used with the pinned parameter.
Must be one of: "first", "mixed".
',
            'in' => 'query',
            'name' => 'pinOrder',
            'schema' => 
            array (
              'type' => 'string',
              'default' => 'first',
              'enum' => 
              array (
                0 => 'first',
                1 => 'mixed',
              ),
            ),
          ),
          7 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          8 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          9 => 
          array (
            'description' => 'Filter by author.
',
            'in' => 'query',
            'name' => 'insertUserID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
            'x-filter' => 
            array (
              'field' => 'd.InsertUserID',
            ),
          ),
          10 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'category',
                  1 => 'insertUser',
                  2 => 'lastUser',
                  3 => 'lastPost',
                  4 => 'all',
                  5 => 'reactions',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
          11 => 
          array (
            'description' => 'The group the discussion is in.',
            'in' => 'query',
            'name' => 'groupID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
            'allowEmptyValue' => true,
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Discussion',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'List discussions.',
        'x-addon' => 'vanilla',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Discussion',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/DiscussionPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Add a discussion.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/bookmarked' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          1 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          2 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'insertUser',
                  1 => 'lastUser',
                  2 => 'lastPost',
                  3 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Discussion',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Get a list of the current user\'s bookmarked discussions.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/idea' => 
    array (
      'x-addon' => 'ideation',
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Discussion',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/DiscussionPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Add an idea.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/question' => 
    array (
      'x-addon' => 'qna',
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Discussion',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/DiscussionPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Add a discussion.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/search' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The numeric ID of a category to limit search results to.
',
            'in' => 'query',
            'name' => 'categoryID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Limit results to those in followed categories. Cannot be used with the categoryID parameter.
',
            'in' => 'query',
            'name' => 'followed',
            'schema' => 
            array (
              'type' => 'boolean',
            ),
          ),
          2 => 
          array (
            'description' => 'Search terms.
',
            'in' => 'query',
            'name' => 'query',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
          3 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          4 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          5 => 
          array (
            'description' => 'Expand associated records.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Discussion',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Search discussions.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Delete a discussion.',
        'x-addon' => 'vanilla',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Discussion',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Get a discussion.',
        'x-addon' => 'vanilla',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Discussion',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/DiscussionPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a discussion.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}/bookmark' => 
    array (
      'put' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'bookmarked' => 
                    array (
                      'description' => 'The current bookmark value.',
                      'type' => 'boolean',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'bookmarked',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'bookmarked' => 
                  array (
                    'description' => 'Pass true to bookmark or false to remove bookmark.',
                    'type' => 'boolean',
                  ),
                ),
                'required' => 
                array (
                  0 => 'bookmarked',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Bookmark a discussion.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}/canonical-url' => 
    array (
      'put' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Discussion',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Not Found',
          ),
          400 => 
          array (
            'description' => 'Bad Request',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'canonicalUrl' => 
                  array (
                    'description' => 'Canonical url for discussion.',
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'canonicalUrl',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Set custom canonical url for a discussion.',
        'x-addon' => 'vanilla',
      ),
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Not Found',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Remove custom canonical url for a discussion.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}/edit' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/DiscussionGetEdit',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Get a discussion for editing.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}/idea' => 
    array (
      'x-addon' => 'ideation',
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'statusID' => 
                    array (
                      'description' => 'Idea status ID.',
                      'type' => 'integer',
                    ),
                    'statusNotes' => 
                    array (
                      'description' => 'Notes on a status change. Notes will persist until overwritten.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'statusID',
                    1 => 'statusNotes',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'statusID' => 
                  array (
                    'description' => 'Idea status ID.',
                    'type' => 'integer',
                  ),
                  'statusNotes' => 
                  array (
                    'description' => 'Notes on a status change. Notes will persist until overwritten.',
                    'minLength' => 1,
                    'nullable' => true,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'statusID',
                  1 => 'statusNotes',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update idea metadata on a discussion.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}/quote' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'bodyRaw' => 
                    array (
                      'description' => 'The raw body of the discussion. This can be an array of rich operations or a string for other formats',
                      'minLength' => 1,
                      'type' => 'string',
                      'x-todo' => 'tpye: array',
                    ),
                    'dateInserted' => 
                    array (
                      'description' => 'When the discussion was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'dateUpdated' => 
                    array (
                      'description' => 'When the discussion was last updated.',
                      'format' => 'date-time',
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'discussionID' => 
                    array (
                      'description' => 'The ID of the discussion.',
                      'type' => 'integer',
                    ),
                    'format' => 
                    array (
                      'description' => 'The original format of the discussion',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'insertUser' => 
                    array (
                      '$ref' => '#/components/schemas/UserFragment',
                    ),
                    'name' => 
                    array (
                      'description' => 'The title of the discussion',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'url' => 
                    array (
                      'description' => 'The full URL to the discussion.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'discussionID',
                    1 => 'name',
                    2 => 'bodyRaw',
                    3 => 'dateInserted',
                    4 => 'dateUpdated',
                    5 => 'insertUser',
                    6 => 'url',
                    7 => 'format',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}/reactions' => 
    array (
      'x-addon' => 'reactions',
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
          2 => 
          array (
            'description' => 'Filter to a specific reaction type by using its URL code.',
            'in' => 'query',
            'name' => 'type',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
            'allowEmptyValue' => true,
          ),
          3 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          4 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'properties' => 
                    array (
                      'dateInserted' => 
                      array (
                        'format' => 'date-time',
                        'type' => 'string',
                      ),
                      'reactionType' => 
                      array (
                        'properties' => 
                        array (
                          'class' => 
                          array (
                            'minLength' => 1,
                            'type' => 'string',
                          ),
                          'name' => 
                          array (
                            'minLength' => 1,
                            'type' => 'string',
                          ),
                          'tagID' => 
                          array (
                            'type' => 'integer',
                          ),
                          'urlcode' => 
                          array (
                            'minLength' => 1,
                            'type' => 'string',
                          ),
                        ),
                        'required' => 
                        array (
                          0 => 'tagID',
                          1 => 'urlcode',
                          2 => 'name',
                          3 => 'class',
                        ),
                        'type' => 'object',
                      ),
                      'recordID' => 
                      array (
                        'type' => 'integer',
                      ),
                      'recordType' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'tagID' => 
                      array (
                        'type' => 'integer',
                      ),
                      'user' => 
                      array (
                        '$ref' => '#/components/schemas/UserFragment',
                      ),
                      'userID' => 
                      array (
                        'type' => 'integer',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'recordType',
                      1 => 'recordID',
                      2 => 'tagID',
                      3 => 'userID',
                      4 => 'dateInserted',
                      5 => 'user',
                      6 => 'reactionType',
                    ),
                    'type' => 'object',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Get reactions to a discussion.',
        'x-addon' => 'vanilla',
      ),
      'post' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'properties' => 
                    array (
                      'class' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'count' => 
                      array (
                        'type' => 'integer',
                      ),
                      'name' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'tagID' => 
                      array (
                        'type' => 'integer',
                      ),
                      'urlcode' => 
                      array (
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'tagID',
                      1 => 'urlcode',
                      2 => 'name',
                      3 => 'class',
                      4 => 'count',
                    ),
                    'type' => 'object',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'reactionType' => 
                  array (
                    'description' => 'URL code of a reaction type.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'reactionType',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'React to a discussion.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/discussions/{id}/reactions/{userID}' => 
    array (
      'x-addon' => 'reactions',
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The discussion ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'The target user ID.
',
            'in' => 'path',
            'name' => 'userID',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          2 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'reactions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Discussions',
        ),
        'summary' => 'Remove a user\'s reaction.',
        'x-addon' => 'vanilla',
      ),
    ),
    '/drafts' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Filter drafts by record type.
',
            'in' => 'query',
            'name' => 'recordType',
            'schema' => 
            array (
              'enum' => 
              array (
                0 => 'comment',
                1 => 'discussion',
              ),
              'type' => 'string',
            ),
          ),
          1 => 
          array (
            'description' => 'Filter by the unique ID of the parent for a draft. Used with recordType.
',
            'in' => 'query',
            'name' => 'parentRecordID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
            'allowEmptyValue' => true,
          ),
          2 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          3 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    'properties' => 
                    array (
                      'attributes' => 
                      array (
                        'description' => 'A free-form object containing all custom data for this draft.',
                        'type' => 'object',
                      ),
                      'dateInserted' => 
                      array (
                        'description' => 'When the draft was created.',
                        'format' => 'date-time',
                        'type' => 'string',
                      ),
                      'dateUpdated' => 
                      array (
                        'description' => 'When the draft was updated.',
                        'format' => 'date-time',
                        'nullable' => true,
                        'type' => 'string',
                      ),
                      'draftID' => 
                      array (
                        'description' => 'The unique ID of the draft.',
                        'type' => 'integer',
                      ),
                      'insertUserID' => 
                      array (
                        'description' => 'The unique ID of the user who created this draft.',
                        'type' => 'integer',
                      ),
                      'parentRecordID' => 
                      array (
                        'description' => 'The unique ID of the intended parent to this record.',
                        'nullable' => true,
                        'type' => 'integer',
                      ),
                      'recordType' => 
                      array (
                        'description' => 'The type of record associated with this draft.',
                        'enum' => 
                        array (
                          0 => 'comment',
                          1 => 'discussion',
                        ),
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'updateUserID' => 
                      array (
                        'description' => 'The unique ID of the user who updated this draft.',
                        'nullable' => true,
                        'type' => 'integer',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'draftID',
                      1 => 'recordType',
                      2 => 'parentRecordID',
                      3 => 'attributes',
                      4 => 'insertUserID',
                      5 => 'dateInserted',
                      6 => 'updateUserID',
                      7 => 'dateUpdated',
                    ),
                    'type' => 'object',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Drafts',
        ),
        'summary' => 'List drafts created by the current user.',
        'x-addon' => 'dashboard',
      ),
      'post' => 
      array (
        'summary' => 'Create a draft.',
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'attributes' => 
                    array (
                      'description' => 'A free-form object containing all custom data for this draft.
',
                      'type' => 'object',
                    ),
                    'dateInserted' => 
                    array (
                      'description' => 'When the draft was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'dateUpdated' => 
                    array (
                      'description' => 'When the draft was updated.',
                      'format' => 'date-time',
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'draftID' => 
                    array (
                      'description' => 'The unique ID of the draft.',
                      'type' => 'integer',
                    ),
                    'insertUserID' => 
                    array (
                      'description' => 'The unique ID of the user who created this draft.',
                      'type' => 'integer',
                    ),
                    'parentRecordID' => 
                    array (
                      'description' => 'The unique ID of the intended parent to this record.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'recordType' => 
                    array (
                      'description' => 'The type of record associated with this draft.',
                      'enum' => 
                      array (
                        0 => 'comment',
                        1 => 'discussion',
                      ),
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'updateUserID' => 
                    array (
                      'description' => 'The unique ID of the user who updated this draft.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'draftID',
                    1 => 'recordType',
                    2 => 'parentRecordID',
                    3 => 'attributes',
                    4 => 'insertUserID',
                    5 => 'dateInserted',
                    6 => 'updateUserID',
                    7 => 'dateUpdated',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Drafts',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/DraftPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/drafts/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The draft ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Drafts',
        ),
        'summary' => 'Delete a draft.',
        'x-addon' => 'dashboard',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The draft ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'attributes' => 
                    array (
                      'description' => 'A free-form object containing all custom data for this draft.
',
                      'type' => 'object',
                    ),
                    'dateInserted' => 
                    array (
                      'description' => 'When the draft was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'dateUpdated' => 
                    array (
                      'description' => 'When the draft was updated.',
                      'format' => 'date-time',
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'draftID' => 
                    array (
                      'description' => 'The unique ID of the draft.',
                      'type' => 'integer',
                    ),
                    'insertUserID' => 
                    array (
                      'description' => 'The unique ID of the user who created this draft.',
                      'type' => 'integer',
                    ),
                    'parentRecordID' => 
                    array (
                      'description' => 'The unique ID of the intended parent to this record.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'recordType' => 
                    array (
                      'description' => 'The type of record associated with this draft.',
                      'enum' => 
                      array (
                        0 => 'comment',
                        1 => 'discussion',
                      ),
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'updateUserID' => 
                    array (
                      'description' => 'The unique ID of the user who updated this draft.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'draftID',
                    1 => 'recordType',
                    2 => 'parentRecordID',
                    3 => 'attributes',
                    4 => 'insertUserID',
                    5 => 'dateInserted',
                    6 => 'updateUserID',
                    7 => 'dateUpdated',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Drafts',
        ),
        'summary' => 'Get a draft.',
        'x-addon' => 'dashboard',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The draft ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'attributes' => 
                    array (
                      'description' => 'A free-form object containing all custom data for this draft.
',
                      'type' => 'object',
                    ),
                    'draftID' => 
                    array (
                      'description' => 'The unique ID of the draft.',
                      'type' => 'integer',
                    ),
                    'parentRecordID' => 
                    array (
                      'description' => 'The unique ID of the intended parent to this record.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'draftID',
                    1 => 'parentRecordID',
                    2 => 'attributes',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Drafts',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/DraftPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a draft.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/drafts/{id}/edit' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The draft ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'attributes' => 
                    array (
                      'description' => 'A free-form object containing all custom data for this draft.
',
                      'type' => 'object',
                    ),
                    'draftID' => 
                    array (
                      'description' => 'The unique ID of the draft.',
                      'type' => 'integer',
                    ),
                    'parentRecordID' => 
                    array (
                      'description' => 'The unique ID of the intended parent to this record.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'draftID',
                    1 => 'parentRecordID',
                    2 => 'attributes',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Drafts',
        ),
        'summary' => 'Get a draft for editing.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/locales' => 
    array (
      'get' => 
      array (
        'summary' => 'Get all enabled locales on the site.',
        'tags' => 
        array (
          0 => 'Locales',
        ),
        'responses' => 
        array (
          200 => 
          array (
            'description' => 'A list of enabled locales',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'type' => 'array',
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Locale',
                  ),
                ),
              ),
            ),
          ),
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/locales/translations/{locale}' => 
    array (
      'get' => 
      array (
        'summary' => 'Get all of the application\'s translation strings.',
        'tags' => 
        array (
          0 => 'Locales',
        ),
        'parameters' => 
        array (
          0 => 
          array (
            '$ref' => '#/components/parameters/LocaleCodeParameter',
          ),
          1 => 
          array (
            '$ref' => '#/components/parameters/CacheBusterParameter',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'description' => 'A map of string keys to translation strings.',
                  'type' => 'object',
                  'additionalProperties' => 
                  array (
                    'type' => 'string',
                  ),
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/locales/translations/{locale}.js' => 
    array (
      'get' => 
      array (
        'summary' => 'Get the application\'s translations strings as a javascrpt file.',
        'description' => 'This endpoint is intended for application optimization where translations are requested within a `<script>` tag
rather than as an external API call.
',
        'tags' => 
        array (
          0 => 'Locales',
        ),
        'parameters' => 
        array (
          0 => 
          array (
            '$ref' => '#/components/parameters/LocaleCodeParameter',
          ),
          1 => 
          array (
            '$ref' => '#/components/parameters/CacheBusterParameter',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'description' => 'Success',
            'content' => 
            array (
              'application/javascript' => 
              array (
                'schema' => 
                array (
                  'type' => 'string',
                ),
              ),
            ),
          ),
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/media' => 
    array (
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'dateInserted' => 
                    array (
                      'description' => 'When the media item was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'foreignID' => 
                    array (
                      'description' => 'The ID of the table.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'foreignType' => 
                    array (
                      'description' => 'Table the media is linked to.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'height' => 
                    array (
                      'description' => 'Image height',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'insertUserID' => 
                    array (
                      'description' => 'The user that created the media item.',
                      'type' => 'integer',
                    ),
                    'mediaID' => 
                    array (
                      'description' => 'The ID of the record.',
                      'type' => 'integer',
                    ),
                    'name' => 
                    array (
                      'description' => 'The original filename of the upload.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'size' => 
                    array (
                      'description' => 'File size in bytes',
                      'type' => 'integer',
                    ),
                    'type' => 
                    array (
                      'description' => 'MIME type',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL of the file.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'width' => 
                    array (
                      'description' => 'Image width',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'mediaID',
                    1 => 'url',
                    2 => 'name',
                    3 => 'type',
                    4 => 'size',
                    5 => 'dateInserted',
                    6 => 'insertUserID',
                    7 => 'foreignType',
                    8 => 'foreignID',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Media',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'file' => 
                  array (
                    '$ref' => '#/components/schemas/UploadedFile',
                  ),
                  'type' => 
                  array (
                    'description' => 'The upload type.',
                    'enum' => 
                    array (
                      0 => 'image',
                      1 => 'text',
                      2 => 'archive',
                      3 => 'binary',
                    ),
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'file',
                  1 => 'type',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Add a media item.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/media/by-url' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Full URL to the item.
',
            'in' => 'query',
            'name' => 'url',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Media',
        ),
        'summary' => 'Delete a media item, using its URL.',
        'x-addon' => 'dashboard',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Full URL to the item.
',
            'in' => 'query',
            'name' => 'url',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'dateInserted' => 
                    array (
                      'description' => 'When the media item was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'foreignID' => 
                    array (
                      'description' => 'The ID of the table.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'foreignType' => 
                    array (
                      'description' => 'Table the media is linked to.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'height' => 
                    array (
                      'description' => 'Image height',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'insertUserID' => 
                    array (
                      'description' => 'The user that created the media item.',
                      'type' => 'integer',
                    ),
                    'mediaID' => 
                    array (
                      'description' => 'The ID of the record.',
                      'type' => 'integer',
                    ),
                    'name' => 
                    array (
                      'description' => 'The original filename of the upload.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'size' => 
                    array (
                      'description' => 'File size in bytes',
                      'type' => 'integer',
                    ),
                    'type' => 
                    array (
                      'description' => 'MIME type',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL of the file.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'width' => 
                    array (
                      'description' => 'Image width',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'mediaID',
                    1 => 'url',
                    2 => 'name',
                    3 => 'type',
                    4 => 'size',
                    5 => 'dateInserted',
                    6 => 'insertUserID',
                    7 => 'foreignType',
                    8 => 'foreignID',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Media',
        ),
        'summary' => 'Get a media item, using its URL.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/media/scrape' => 
    array (
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'attributes' => 
                    array (
                      'description' => 'Any additional attributes required by the the specific embed.',
                      'nullable' => true,
                      'type' => 'object',
                    ),
                    'body' => 
                    array (
                      'description' => 'A paragraph summarizing the content, if any. This is not what is what gets rendered to the page.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'height' => 
                    array (
                      'description' => 'The height of the image/video/etc. if applicable. This may be the photoUrl, but might exist even when there is no photoUrl in the case of a video without preview image.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'name' => 
                    array (
                      'description' => 'The title of the page/item/etc. if any.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'photoUrl' => 
                    array (
                      'description' => 'A photo that goes with the content.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'type' => 
                    array (
                      'description' => 'The type of site. This determines how the embed is rendered.',
                      'enum' => 
                      array (
                        0 => 'quote',
                        1 => 'twitter',
                        2 => 'youtube',
                        3 => 'vimeo',
                        4 => 'instagram',
                        5 => 'soundcloud',
                        6 => 'imgur',
                        7 => 'twitch',
                        8 => 'getty',
                        9 => 'giphy',
                        10 => 'wistia',
                        11 => 'codepen',
                        12 => 'image',
                        13 => 'link',
                      ),
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL that was scraped.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'width' => 
                    array (
                      'description' => 'The width of the image/video/etc. if applicable.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'url',
                    1 => 'type',
                    2 => 'name',
                    3 => 'body',
                    4 => 'photoUrl',
                    5 => 'height',
                    6 => 'width',
                    7 => 'attributes',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Media',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'force' => 
                  array (
                    'default' => false,
                    'description' => 'Force the scrape even if the result is cached.',
                    'type' => 'boolean',
                  ),
                  'url' => 
                  array (
                    'description' => 'The URL to scrape.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'url',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Scrape information from a URL.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/media/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The media ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'dateInserted' => 
                    array (
                      'description' => 'When the media item was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'foreignID' => 
                    array (
                      'description' => 'The ID of the table.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'foreignType' => 
                    array (
                      'description' => 'Table the media is linked to.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'height' => 
                    array (
                      'description' => 'Image height',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'insertUserID' => 
                    array (
                      'description' => 'The user that created the media item.',
                      'type' => 'integer',
                    ),
                    'mediaID' => 
                    array (
                      'description' => 'The ID of the record.',
                      'type' => 'integer',
                    ),
                    'name' => 
                    array (
                      'description' => 'The original filename of the upload.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'size' => 
                    array (
                      'description' => 'File size in bytes',
                      'type' => 'integer',
                    ),
                    'type' => 
                    array (
                      'description' => 'MIME type',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL of the file.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'width' => 
                    array (
                      'description' => 'Image width',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'mediaID',
                    1 => 'url',
                    2 => 'name',
                    3 => 'type',
                    4 => 'size',
                    5 => 'dateInserted',
                    6 => 'insertUserID',
                    7 => 'foreignType',
                    8 => 'foreignID',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Media',
        ),
        'summary' => 'Delete a media item.',
        'x-addon' => 'dashboard',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The media ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'dateInserted' => 
                    array (
                      'description' => 'When the media item was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'foreignID' => 
                    array (
                      'description' => 'The ID of the table.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'foreignType' => 
                    array (
                      'description' => 'Table the media is linked to.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'height' => 
                    array (
                      'description' => 'Image height',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'insertUserID' => 
                    array (
                      'description' => 'The user that created the media item.',
                      'type' => 'integer',
                    ),
                    'mediaID' => 
                    array (
                      'description' => 'The ID of the record.',
                      'type' => 'integer',
                    ),
                    'name' => 
                    array (
                      'description' => 'The original filename of the upload.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'size' => 
                    array (
                      'description' => 'File size in bytes',
                      'type' => 'integer',
                    ),
                    'type' => 
                    array (
                      'description' => 'MIME type',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL of the file.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'width' => 
                    array (
                      'description' => 'Image width',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'mediaID',
                    1 => 'url',
                    2 => 'name',
                    3 => 'type',
                    4 => 'size',
                    5 => 'dateInserted',
                    6 => 'insertUserID',
                    7 => 'foreignType',
                    8 => 'foreignID',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Media',
        ),
        'summary' => 'Get a media item.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/media/{id}/attachment' => 
    array (
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The media ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'dateInserted' => 
                    array (
                      'description' => 'When the media item was created.',
                      'format' => 'date-time',
                      'type' => 'string',
                    ),
                    'foreignID' => 
                    array (
                      'description' => 'The ID of the table.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'foreignType' => 
                    array (
                      'description' => 'Table the media is linked to.',
                      'minLength' => 1,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'height' => 
                    array (
                      'description' => 'Image height',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                    'insertUserID' => 
                    array (
                      'description' => 'The user that created the media item.',
                      'type' => 'integer',
                    ),
                    'mediaID' => 
                    array (
                      'description' => 'The ID of the record.',
                      'type' => 'integer',
                    ),
                    'name' => 
                    array (
                      'description' => 'The original filename of the upload.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'size' => 
                    array (
                      'description' => 'File size in bytes',
                      'type' => 'integer',
                    ),
                    'type' => 
                    array (
                      'description' => 'MIME type',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'url' => 
                    array (
                      'description' => 'The URL of the file.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'width' => 
                    array (
                      'description' => 'Image width',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'mediaID',
                    1 => 'url',
                    2 => 'name',
                    3 => 'type',
                    4 => 'size',
                    5 => 'dateInserted',
                    6 => 'insertUserID',
                    7 => 'foreignType',
                    8 => 'foreignID',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Media',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/MediaItemPatch',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a media item\'s attachment to another record.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/messages' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Filter by conversation.
',
            'in' => 'query',
            'name' => 'conversationID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Filter by author.
',
            'in' => 'query',
            'name' => 'insertUserID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          2 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          3 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 50,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          4 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'insertUser',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Message',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Messages',
        ),
        'summary' => 'List user messages.',
        'x-addon' => 'conversations',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Message',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Messages',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/MessagePost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Add a message.',
        'x-addon' => 'conversations',
      ),
    ),
    '/messages/{id}' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The message ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Message',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Messages',
        ),
        'summary' => 'Get a message.',
        'x-addon' => 'conversations',
      ),
    ),
    '/notifications' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          1 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/NotificationSchema',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Notifications',
        ),
        'summary' => 'List notifications for the current user.',
        'x-addon' => 'dashboard',
      ),
      'patch' => 
      array (
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Notifications',
        ),
        'requestBody' => 
        array (
          '$ref' => '#/components/requestBodies/NotificationSchema',
        ),
        'summary' => 'Update all notifications.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/notifications/{id}' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The notification ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/NotificationSchema',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Notifications',
        ),
        'summary' => 'Get a single notification.',
        'x-addon' => 'dashboard',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/NotificationSchema',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Notifications',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/NotificationSchema',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a notification.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/rich/quote' => 
    array (
      'post' => 
      array (
        'summary' => 'Create a rich-compatible HTML representation of a string for quoting.',
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'body' => 
                  array (
                    'description' => 'Raw post text to render as a rich post quote.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                  'format' => 
                  array (
                    'description' => 'The format to be used for rendering the text.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'body',
                  1 => 'format',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'type' => 'object',
                  'properties' => 
                  array (
                    'quote' => 
                    array (
                      'description' => 'A quoted representation of the text, rendered as HTML.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'quote',
                  ),
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Rich',
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/roles' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'permissions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Role',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'summary' => 'List roles.',
        'x-addon' => 'dashboard',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Role',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'requestBody' => 
        array (
          '$ref' => '#/components/requestBodies/RolePost',
        ),
        'summary' => 'Add a role.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/roles/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The role ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'summary' => 'Delete a role.',
        'x-addon' => 'dashboard',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The role ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'permissions',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Role',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'summary' => 'Get a role.',
        'x-addon' => 'dashboard',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The role ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Role',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/RolePost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a role.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/roles/{id}/edit' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The role ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'canSession' => 
                    array (
                      'description' => 'Can users in this role start a session?',
                      'type' => 'boolean',
                    ),
                    'deletable' => 
                    array (
                      'description' => 'Is the role deletable?',
                      'type' => 'boolean',
                    ),
                    'description' => 
                    array (
                      'description' => 'Description of the role.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'name' => 
                    array (
                      'description' => 'Name of the role.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'personalInfo' => 
                    array (
                      'description' => 'Is membership in this role personal information?',
                      'type' => 'boolean',
                    ),
                    'roleID' => 
                    array (
                      'description' => 'ID of the role.',
                      'type' => 'integer',
                    ),
                    'type' => 
                    array (
                      'description' => 'Default type of this role.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'roleID',
                    1 => 'name',
                    2 => 'description',
                    3 => 'type',
                    4 => 'deletable',
                    5 => 'canSession',
                    6 => 'personalInfo',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'summary' => 'Get a role for editing.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/roles/{id}/permissions' => 
    array (
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/PermissionFragment',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'items' => 
                array (
                  '$ref' => '#/components/schemas/PermissionFragment',
                ),
                'type' => 'array',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update permissions on a role',
        'x-addon' => 'dashboard',
      ),
      'put' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/PermissionFragment',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Roles',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'items' => 
                array (
                  '$ref' => '#/components/schemas/PermissionFragment',
                ),
                'type' => 'array',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Overwrite all permissions for a role.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/search' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Filter the records using the supplied terms.
',
            'in' => 'query',
            'name' => 'query',
            'schema' => 
            array (
              'type' => 'string',
            ),
            'x-search-filter' => true,
          ),
          1 => 
          array (
            'description' => 'Restrict the search to the specified main type(s) of records.
',
            'in' => 'query',
            'name' => 'recordTypes',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'discussion',
                  1 => 'comment',
                  2 => 'group',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
          2 => 
          array (
            'description' => 'Restrict the search to the specified type(s) of records.
',
            'in' => 'query',
            'name' => 'types',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'discussion',
                  1 => 'comment',
                  2 => 'question',
                  3 => 'group',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
          3 => 
          array (
            'description' => 'Set the scope of the search to the comments of a discussion. Incompatible with recordType and type.
',
            'in' => 'query',
            'name' => 'discussionID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
            'x-search-scope' => true,
          ),
          4 => 
          array (
            'description' => 'Set the scope of the search to a specific category.
',
            'in' => 'query',
            'name' => 'categoryID',
            'schema' => 
            array (
              'type' => 'integer',
            ),
            'x-search-scope' => true,
          ),
          5 => 
          array (
            'description' => 'Set the scope of the search to followed categories only.
',
            'in' => 'query',
            'name' => 'followedCategories',
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
            'x-search-scope' => true,
          ),
          6 => 
          array (
            'description' => 'Search the specified category\'s subtree. Works with categoryID
',
            'in' => 'query',
            'name' => 'includeChildCategories',
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
          ),
          7 => 
          array (
            'description' => 'Allow search in archived categories.
',
            'in' => 'query',
            'name' => 'includeArchivedCategories',
            'schema' => 
            array (
              'default' => false,
              'type' => 'boolean',
            ),
          ),
          8 => 
          array (
            'description' => 'Filter the records by matching part of their name.
',
            'in' => 'query',
            'name' => 'name',
            'schema' => 
            array (
              'type' => 'string',
            ),
            'x-search-filter' => true,
          ),
          9 => 
          array (
            'description' => 'Filter the records by inserted user names.
',
            'in' => 'query',
            'name' => 'insertUserNames',
            'schema' => 
            array (
              'items' => 
              array (
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
            'x-search-filter' => true,
          ),
          10 => 
          array (
            'description' => 'Filter the records by inserted userIDs.
',
            'in' => 'query',
            'name' => 'insertUserIDs',
            'schema' => 
            array (
              'items' => 
              array (
                'type' => 'integer',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
            'x-search-filter' => true,
          ),
          11 => 
          array (
            '$ref' => '#/components/parameters/DateInserted',
          ),
          12 => 
          array (
            'description' => 'Filter discussions by matching tags.
',
            'in' => 'query',
            'name' => 'tags',
            'schema' => 
            array (
              'items' => 
              array (
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
            'x-search-filter' => true,
          ),
          13 => 
          array (
            'description' => 'Tags search condition.
Must be one of: "and", "or".
',
            'in' => 'query',
            'name' => 'tagOperator',
            'schema' => 
            array (
              'type' => 'string',
              'default' => 'or',
              'enum' => 
              array (
                0 => 'and',
                1 => 'or',
              ),
            ),
          ),
          14 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          15 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          16 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'insertUser',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/SearchResult',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Search',
        ),
        'summary' => 'Search for records matching specific criteria.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Theme',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get a theme.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}/assets/fonts.json' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/ThemeFont',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Fonts could not be found.',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ThemeAssetNotFound',
                ),
              ),
            ),
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get custom fonts of a theme.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}/assets/footer.html' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'text/html' => 
              array (
                'schema' => 
                array (
                  'type' => 'string',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Footer could not be found.',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ThemeAssetNotFound',
                ),
              ),
            ),
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get the footer HTML of a theme.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}/assets/header.html' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'text/html' => 
              array (
                'schema' => 
                array (
                  'type' => 'string',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Header could not be found.',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ThemeAssetNotFound',
                ),
              ),
            ),
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get the header HTML of a theme.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}/assets/javascript.js' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/javascript' => 
              array (
                'schema' => 
                array (
                  'type' => 'string',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'JavaScript could not be found.',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ThemeAssetNotFound',
                ),
              ),
            ),
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get JavaScript to be used as part of a theme.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}/assets/scripts.json' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/ThemeScript',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Additional scripts could not be found.',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ThemeAssetNotFound',
                ),
              ),
            ),
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get additional script files of a theme.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}/assets/styles.css' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'text/css' => 
              array (
                'schema' => 
                array (
                  'type' => 'string',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Stylesheet could not be found.',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ThemeAssetNotFound',
                ),
              ),
            ),
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get theme styles.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/themes/{key}/assets/variables.json' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Unique theme slug.',
            'in' => 'path',
            'name' => 'key',
            'required' => true,
            'schema' => 
            array (
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
          404 => 
          array (
            'description' => 'Variables could not be found.',
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/ThemeAssetNotFound',
                ),
              ),
            ),
          ),
        ),
        'tags' => 
        array (
          0 => 'Themes',
        ),
        'summary' => 'Get theme variables.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/tick' => 
    array (
      'post' => 
      array (
        'summary' => 'Register a page view for statistical and analytical purpose.',
        'responses' => 
        array (
          201 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Statistics',
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/tokens' => 
    array (
      'get' => 
      array (
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/Token',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Tokens',
        ),
        'summary' => 'Get a list of access token IDs for the current user.',
        'x-addon' => 'dashboard',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Token',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Tokens',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/Token',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Issue a new access token for the current user.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/tokens/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The numeric ID of a token.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Tokens',
        ),
        'summary' => 'Revoke an access token.',
        'x-addon' => 'dashboard',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The numeric ID of a token.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'A valid CSRF token for the current user.
',
            'in' => 'query',
            'name' => 'transientKey',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/Token',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Tokens',
        ),
        'summary' => 'Reveal a usable access token.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'When the user was created.
This filter receive a string that can take two forms.
A single date that matches \'{Operator}{DateTime}\' where {Operator} can be =, &lt;, &gt;, &lt;=, &gt;=  and, if omitted, defaults to =.
A date range that matches \'{Opening}{DateTime},{DateTime}{Closing}\' where {Opening} can be \'[\' or \'(\' and {Closing} can be \']\' or \')\'. \'[]\' are inclusive and \'()\' are exclusive.
',
            'in' => 'query',
            'name' => 'dateInserted',
            'schema' => 
            array (
              'format' => 'date-filter',
              'type' => 'string',
            ),
          ),
          1 => 
          array (
            'description' => 'When the user was updated.
This filter receive a string that can take two forms.
A single date that matches \'{Operator}{DateTime}\' where {Operator} can be =, &lt;, &gt;, &lt;=, &gt;=  and, if omitted, defaults to =.
A date range that matches \'{Opening}{DateTime},{DateTime}{Closing}\' where {Opening} can be \'[\' or \'(\' and {Closing} can be \']\' or \')\'. \'[]\' are inclusive and \'()\' are exclusive.
',
            'in' => 'query',
            'name' => 'dateUpdated',
            'schema' => 
            array (
              'format' => 'date-filter',
              'type' => 'string',
            ),
          ),
          2 => 
          array (
            'description' => 'One or more user IDs to lookup.
',
            'in' => 'query',
            'name' => 'userID',
            'schema' => 
            array (
              'items' => 
              array (
                'type' => 'integer',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
            'x-filter' => 
            array (
              'field' => 'u.UserID',
            ),
          ),
          3 => 
          array (
            '$ref' => '#/components/parameters/Page',
          ),
          4 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
          5 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'rank',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/User',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'summary' => 'List users.',
        'x-addon' => 'dashboard',
      ),
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/User',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/UserPost',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Add a user.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/by-names' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'Filter for username. Supports full or partial matching with appended wildcard (e.g. User*).
',
            'in' => 'query',
            'name' => 'name',
            'required' => true,
            'schema' => 
            array (
              'minLength' => 1,
              'type' => 'string',
            ),
          ),
          1 => 
          array (
            'description' => 'Sort method for results.
Must be one of: "countComments", "dateLastActive", "name", "mention".
',
            'in' => 'query',
            'name' => 'order',
            'schema' => 
            array (
              'type' => 'string',
              'default' => 'name',
              'enum' => 
              array (
                0 => 'countComments',
                1 => 'dateLastActive',
                2 => 'name',
                3 => 'mention',
              ),
            ),
          ),
          2 => 
          array (
            'description' => 'Page number. See [Pagination](https://docs.vanillaforums.com/apiv2/#pagination).
',
            'in' => 'query',
            'name' => 'page',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 1,
              'minimum' => 1,
            ),
          ),
          3 => 
          array (
            'description' => 'Desired number of items per page.
',
            'in' => 'query',
            'name' => 'limit',
            'schema' => 
            array (
              'type' => 'integer',
              'default' => 30,
              'maximum' => 100,
              'minimum' => 1,
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'items' => 
                  array (
                    '$ref' => '#/components/schemas/UserFragment',
                  ),
                  'type' => 'array',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'summary' => 'Search for users by full or partial name matching.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/me' => 
    array (
      'get' => 
      array (
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'allOf' => 
                  array (
                    0 => 
                    array (
                      '$ref' => '#/components/schemas/UserFragment',
                    ),
                    1 => 
                    array (
                      'type' => 'object',
                      'properties' => 
                      array (
                        'isAdmin' => 
                        array (
                          'description' => 'Whether or not the user is a global admin.',
                          'type' => 'boolean',
                        ),
                        'permissions' => 
                        array (
                          'description' => 'Global permissions available to the current user.',
                          'type' => 'array',
                          'items' => 
                          array (
                            'type' => 'string',
                          ),
                        ),
                      ),
                      'required' => 
                      array (
                        0 => 'isAdmin',
                        1 => 'permissions',
                      ),
                    ),
                  ),
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'summary' => 'Get information about the current user.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/me-counts' => 
    array (
      'get' => 
      array (
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'counts' => 
                    array (
                      'type' => 'array',
                      'items' => 
                      array (
                        'type' => 'object',
                        'properties' => 
                        array (
                          'name' => 
                          array (
                            'description' => 'Menu counter name',
                            'type' => 'string',
                          ),
                          'count' => 
                          array (
                            'description' => 'Counter value',
                            'type' => 'integer',
                          ),
                        ),
                      ),
                      'example' => 
                      array (
                        0 => 
                        array (
                          'name' => 'UnreadNotifications',
                          'count' => 2,
                        ),
                        1 => 
                        array (
                          'name' => 'Bookmarks',
                          'count' => 3,
                        ),
                      ),
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'counts',
                  ),
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'summary' => 'Get information about menu counts for current user.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/register' => 
    array (
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'email' => 
                    array (
                      'description' => 'Email address of the user.',
                      'minLength' => 0,
                      'type' => 'string',
                    ),
                    'name' => 
                    array (
                      'description' => 'Name of the user.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'userID' => 
                    array (
                      'description' => 'ID of the user.',
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'userID',
                    1 => 'name',
                    2 => 'email',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'discoveryText' => 
                  array (
                    'description' => 'Why does the user wish to join? Only used when the registration is flagged as SPAM (response code: 202).',
                    'type' => 'string',
                  ),
                  'email' => 
                  array (
                    'description' => 'An email address for this user.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                  'name' => 
                  array (
                    'description' => 'The username.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                  'password' => 
                  array (
                    'description' => 'A password for this user.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'email',
                  1 => 'name',
                  2 => 'password',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Submit a new user registration.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/request-password' => 
    array (
      'post' => 
      array (
        'responses' => 
        array (
          201 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'email' => 
                  array (
                    'description' => 'The email/username of the user.',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'email',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/{id}' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'deleteMethod' => 
                  array (
                    'type' => 'string',
                    'default' => 'delete',
                    'description' => 'The deletion method / strategy.',
                    'enum' => 
                    array (
                      0 => 'keep',
                      1 => 'wipe',
                      2 => 'delete',
                    ),
                  ),
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Delete a user.',
        'x-addon' => 'dashboard',
      ),
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'rank',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/User',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'summary' => 'Get a user.',
        'x-addon' => 'dashboard',
      ),
      'patch' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  '$ref' => '#/components/schemas/User',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                '$ref' => '#/components/schemas/UserPatch',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Update a user.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/{id}/ban' => 
    array (
      'put' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'banned' => 
                    array (
                      'description' => 'The current banned value.',
                      'type' => 'boolean',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'banned',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'banned' => 
                  array (
                    'description' => 'Pass true to ban or false to unban.',
                    'type' => 'boolean',
                  ),
                ),
                'required' => 
                array (
                  0 => 'banned',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Ban a user.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/{id}/confirm-email' => 
    array (
      'post' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'email' => 
                    array (
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'emailConfirmed' => 
                    array (
                      'type' => 'boolean',
                    ),
                    'userID' => 
                    array (
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'userID',
                    1 => 'email',
                    2 => 'emailConfirmed',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'confirmationCode' => 
                  array (
                    'description' => 'Email confirmation code',
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'confirmationCode',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Confirm a users current email address by using a confirmation code',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/{id}/edit' => 
    array (
      'get' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'rank',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'bypassSpam' => 
                    array (
                      'description' => 'Should submissions from this user bypass SPAM checks?',
                      'type' => 'boolean',
                    ),
                    'email' => 
                    array (
                      'description' => 'Email address of the user.',
                      'minLength' => 0,
                      'type' => 'string',
                    ),
                    'emailConfirmed' => 
                    array (
                      'description' => 'Has the email address for this user been confirmed?',
                      'type' => 'boolean',
                    ),
                    'name' => 
                    array (
                      'description' => 'Name of the user.',
                      'minLength' => 1,
                      'type' => 'string',
                    ),
                    'photo' => 
                    array (
                      'description' => 'Raw photo field value from the user record.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                    'userID' => 
                    array (
                      'description' => 'ID of the user.',
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'userID',
                    1 => 'name',
                    2 => 'email',
                    3 => 'photo',
                    4 => 'emailConfirmed',
                    5 => 'bypassSpam',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'summary' => 'Get a user for editing.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/{id}/hidden' => 
    array (
      'put' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'hidden' => 
                    array (
                      'description' => 'Whether not the user is hidden from Online status.',
                      'type' => 'boolean',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'hidden',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'hidden' => 
                  array (
                    'description' => 'Whether not the user should be hidden from Online status.',
                    'type' => 'boolean',
                  ),
                ),
                'required' => 
                array (
                  0 => 'hidden',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'summary' => 'Adjust a user’s Online privacy.',
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/{id}/photo' => 
    array (
      'delete' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'description' => 'The user ID.
',
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
          1 => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.
',
            'in' => 'query',
            'name' => 'expand',
            'schema' => 
            array (
              'items' => 
              array (
                'enum' => 
                array (
                  0 => 'rank',
                  1 => 'all',
                ),
                'type' => 'string',
              ),
              'type' => 'array',
            ),
            'style' => 'form',
          ),
        ),
        'responses' => 
        array (
          204 => 
          array (
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'summary' => 'Delete a user photo.',
        'x-addon' => 'dashboard',
      ),
      'post' => 
      array (
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'photoUrl' => 
                    array (
                      'description' => 'URL to the user photo.',
                      'minLength' => 0,
                      'nullable' => true,
                      'type' => 'string',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'photoUrl',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'tags' => 
        array (
          0 => 'Users',
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'photo' => 
                  array (
                    'type' => 'string',
                    'format' => 'binary',
                  ),
                ),
                'required' => 
                array (
                  0 => 'photo',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    '/users/{id}/rank' => 
    array (
      'x-addon' => 'ranks',
      'put' => 
      array (
        'summary' => 'Update the rank of a user.',
        'tags' => 
        array (
          0 => 'Users',
        ),
        'parameters' => 
        array (
          0 => 
          array (
            'in' => 'path',
            'name' => 'id',
            'required' => true,
            'schema' => 
            array (
              'type' => 'integer',
            ),
          ),
        ),
        'requestBody' => 
        array (
          'content' => 
          array (
            'application/json' => 
            array (
              'schema' => 
              array (
                'properties' => 
                array (
                  'rankID' => 
                  array (
                    'description' => 'ID of the user rank.',
                    'nullable' => true,
                    'type' => 'integer',
                  ),
                ),
                'required' => 
                array (
                  0 => 'rankID',
                ),
                'type' => 'object',
              ),
            ),
          ),
          'required' => true,
        ),
        'responses' => 
        array (
          200 => 
          array (
            'content' => 
            array (
              'application/json' => 
              array (
                'schema' => 
                array (
                  'properties' => 
                  array (
                    'rankID' => 
                    array (
                      'description' => 'ID of the user rank.',
                      'nullable' => true,
                      'type' => 'integer',
                    ),
                  ),
                  'required' => 
                  array (
                    0 => 'rankID',
                  ),
                  'type' => 'object',
                ),
              ),
            ),
            'description' => 'Success',
          ),
        ),
        'x-addon' => 'dashboard',
      ),
    ),
  ),
  'components' => 
  array (
    'schemas' => 
    array (
      'Addon' => 
      array (
        'properties' => 
        array (
          'addonID' => 
          array (
            'description' => 'The ID of the addon used for API calls.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'conflict' => 
          array (
            'description' => 'An array of addons that conflict with this addon.',
            'items' => 
            array (
              'properties' => 
              array (
                'addonID' => 
                array (
                  'description' => 'The ID of the addon used for API calls.',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'constraint' => 
                array (
                  'description' => 'The version requirement.',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'key' => 
                array (
                  'description' => 'The unique key that identifies the addon',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'name' => 
                array (
                  'description' => 'The name of the addon.',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'type' => 
                array (
                  'description' => 'The type of addon.',
                  'enum' => 
                  array (
                    0 => 'addon',
                    1 => 'theme',
                    2 => 'locale',
                  ),
                  'minLength' => 1,
                  'type' => 'string',
                ),
              ),
              'required' => 
              array (
                0 => 'addonID',
                1 => 'name',
                2 => 'key',
                3 => 'type',
                4 => 'constraint',
              ),
              'type' => 'object',
            ),
            'type' => 'array',
          ),
          'description' => 
          array (
            'description' => 'The addon\'s description',
            'type' => 'string',
          ),
          'enabled' => 
          array (
            'description' => 'Whether or not the addon is enabled.',
            'type' => 'boolean',
          ),
          'iconUrl' => 
          array (
            'description' => 'The addon\'s icon.',
            'format' => 'uri',
            'minLength' => 1,
            'type' => 'string',
          ),
          'key' => 
          array (
            'description' => 'The unique key that identifies the addon',
            'minLength' => 1,
            'type' => 'string',
          ),
          'name' => 
          array (
            'description' => 'The name of the addon.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'require' => 
          array (
            'description' => 'An array of addons that are required to enable the addon.',
            'items' => 
            array (
              'properties' => 
              array (
                'addonID' => 
                array (
                  'description' => 'The ID of the addon used for API calls.',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'constraint' => 
                array (
                  'description' => 'The version requirement.',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'key' => 
                array (
                  'description' => 'The unique key that identifies the addon',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'name' => 
                array (
                  'description' => 'The name of the addon.',
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'type' => 
                array (
                  'description' => 'The type of addon.',
                  'enum' => 
                  array (
                    0 => 'addon',
                    1 => 'theme',
                    2 => 'locale',
                  ),
                  'minLength' => 1,
                  'type' => 'string',
                ),
              ),
              'required' => 
              array (
                0 => 'addonID',
                1 => 'name',
                2 => 'key',
                3 => 'type',
                4 => 'constraint',
              ),
              'type' => 'object',
            ),
            'type' => 'array',
          ),
          'type' => 
          array (
            'description' => 'The type of addon.',
            'enum' => 
            array (
              0 => 'addon',
              1 => 'theme',
              2 => 'locale',
            ),
            'minLength' => 1,
            'type' => 'string',
          ),
          'version' => 
          array (
            'description' => 'The addon\'s version.',
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'addonID',
          1 => 'name',
          2 => 'key',
          3 => 'type',
          4 => 'iconUrl',
          5 => 'version',
          6 => 'enabled',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'CategoryFragment' => 
      array (
        'properties' => 
        array (
          'categoryID' => 
          array (
            'description' => 'The ID of the category.',
            'type' => 'integer',
          ),
          'name' => 
          array (
            'description' => 'The name of the category.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'url' => 
          array (
            'description' => 'Full URL to the category.',
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'categoryID',
          1 => 'name',
          2 => 'url',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'CategoryPost' => 
      array (
        'properties' => 
        array (
          'customPermissions' => 
          array (
            'description' => 'Are custom permissions set for this category?',
            'type' => 'boolean',
          ),
          'displayAs' => 
          array (
            'type' => 'string',
            'default' => 'discussions',
            'description' => 'The display style of the category.',
            'enum' => 
            array (
              0 => 'categories',
              1 => 'discussions',
              2 => 'flat',
              3 => 'heading',
            ),
            'minLength' => 1,
          ),
          'name' => 
          array (
            'description' => 'The name of the category.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'parentCategoryID' => 
          array (
            'description' => 'Parent category ID.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'urlcode' => 
          array (
            'description' => 'The URL code of the category.',
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'name',
          1 => 'urlcode',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'Comment' => 
      array (
        'properties' => 
        array (
          'attributes' => 
          array (
            'nullable' => true,
            'properties' => 
            array (
              'hootsuite' => 
              array (
                'description' => 'Hootsuite metadata.',
                'type' => 'object',
                'x-addon' => 'hootsuite',
              ),
            ),
            'type' => 'object',
          ),
          'body' => 
          array (
            'description' => 'The body of the comment.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'commentID' => 
          array (
            'description' => 'The ID of the comment.',
            'type' => 'integer',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the comment was created.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'dateUpdated' => 
          array (
            'description' => 'When the comment was last updated.',
            'format' => 'date-time',
            'nullable' => true,
            'type' => 'string',
          ),
          'discussionID' => 
          array (
            'description' => 'The ID of the discussion.',
            'type' => 'integer',
          ),
          'insertUser' => 
          array (
            '$ref' => '#/components/schemas/UserFragment',
          ),
          'insertUserID' => 
          array (
            'description' => 'The user that created the comment.',
            'type' => 'integer',
          ),
          'reactions' => 
          array (
            'type' => 'array',
            'items' => 
            array (
              'properties' => 
              array (
                'class' => 
                array (
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'count' => 
                array (
                  'type' => 'integer',
                ),
                'name' => 
                array (
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'tagID' => 
                array (
                  'type' => 'integer',
                ),
                'urlcode' => 
                array (
                  'minLength' => 1,
                  'type' => 'string',
                ),
              ),
              'required' => 
              array (
                0 => 'tagID',
                1 => 'urlcode',
                2 => 'name',
                3 => 'class',
                4 => 'count',
              ),
              'type' => 'object',
            ),
            'x-addon' => 'reactions',
          ),
          'score' => 
          array (
            'description' => 'Total points associated with this post.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'url' => 
          array (
            'description' => 'The full URL to the comment.',
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'commentID',
          1 => 'discussionID',
          2 => 'body',
          3 => 'dateInserted',
          4 => 'dateUpdated',
          5 => 'insertUserID',
          6 => 'score',
          7 => 'attributes',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'CommentGet' => 
      array (
        'properties' => 
        array (
          'expand' => 
          array (
            'description' => 'Expand associated records using one or more valid field names. A value of "all" will expand all expandable fields.',
            'items' => 
            array (
              'enum' => 
              array (
                0 => 'reactions',
                1 => 'all',
              ),
              'type' => 'string',
            ),
            'type' => 'array',
            'x-collectionFormat' => 'csv',
          ),
          'id' => 
          array (
            'description' => 'The comment ID.',
            'type' => 'integer',
          ),
        ),
        'required' => 
        array (
          0 => 'id',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'CommentPost' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The body of the comment.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'discussionID' => 
          array (
            'description' => 'The ID of the discussion.',
            'type' => 'integer',
          ),
          'format' => 
          array (
            'description' => 'The input format of the comment.',
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'body',
          1 => 'format',
          2 => 'discussionID',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'Conversation' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The most recent unread message in the conversation.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'conversationID' => 
          array (
            'description' => 'The ID of the conversation.',
            'type' => 'integer',
          ),
          'countMessages' => 
          array (
            'description' => 'The number of messages on the conversation.',
            'type' => 'integer',
          ),
          'countParticipants' => 
          array (
            'description' => 'The number of participants on the conversation.',
            'type' => 'integer',
          ),
          'countUnread' => 
          array (
            'description' => 'The number of unread messages.',
            'type' => 'integer',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the conversation was created.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'insertUser' => 
          array (
            '$ref' => '#/components/schemas/UserFragment',
          ),
          'insertUserID' => 
          array (
            'description' => 'The user that created the conversation.',
            'type' => 'integer',
          ),
          'lastMessage' => 
          array (
            'properties' => 
            array (
              'dateInserted' => 
              array (
                'description' => 'The date of the message.',
                'format' => 'date-time',
                'type' => 'string',
              ),
              'insertUser' => 
              array (
                '$ref' => '#/components/schemas/UserFragment',
              ),
              'insertUserID' => 
              array (
                'description' => 'The author of the your most recent message.',
                'type' => 'integer',
              ),
            ),
            'required' => 
            array (
              0 => 'insertUserID',
              1 => 'dateInserted',
              2 => 'insertUser',
            ),
            'type' => 'object',
          ),
          'name' => 
          array (
            'description' => 'The name of the conversation.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'participants' => 
          array (
            '$ref' => '#/components/schemas/ConversationParticipants',
          ),
          'unread' => 
          array (
            'description' => 'Whether the conversation has an unread indicator.',
            'type' => 'boolean',
          ),
          'url' => 
          array (
            'description' => 'The URL of the conversation.',
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'conversationID',
          1 => 'name',
          2 => 'body',
          3 => 'url',
          4 => 'dateInserted',
          5 => 'insertUserID',
          6 => 'countParticipants',
          7 => 'countMessages',
        ),
        'type' => 'object',
        'x-addon' => 'conversations',
      ),
      'ConversationParticipants' => 
      array (
        'description' => 'List of participants.',
        'items' => 
        array (
          'properties' => 
          array (
            'userID' => 
            array (
              'description' => 'The userID of the participant.',
              'type' => 'integer',
            ),
            'status' => 
            array (
              'description' => 'Participation status of the user.',
              'enum' => 
              array (
                0 => 'participating',
                1 => 'deleted',
              ),
              'type' => 'string',
            ),
            'user' => 
            array (
              '$ref' => '#/components/schemas/UserFragment',
            ),
          ),
          'required' => 
          array (
            0 => 'userID',
            1 => 'status',
          ),
          'type' => 'object',
        ),
        'type' => 'array',
        'x-addon' => 'conversations',
      ),
      'ConversationPost' => 
      array (
        'properties' => 
        array (
          'name' => 
          array (
            'type' => 'string',
          ),
          'participantUserIDs' => 
          array (
            'description' => 'List of userID of the participants.',
            'items' => 
            array (
              'type' => 'integer',
            ),
            'type' => 'array',
          ),
        ),
        'required' => 
        array (
          0 => 'participantUserIDs',
          1 => 'name',
        ),
        'type' => 'object',
        'x-addon' => 'conversations',
      ),
      'Discussion' => 
      array (
        'properties' => 
        array (
          'attributes' => 
          array (
            'properties' => 
            array (
              'idea' => 
              array (
                'properties' => 
                array (
                  'status' => 
                  array (
                    'properties' => 
                    array (
                      'name' => 
                      array (
                        'description' => 'Label for the status.',
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                      'state' => 
                      array (
                        'description' => 'The open/closed state of an idea.',
                        'enum' => 
                        array (
                          0 => 'open',
                          1 => 'closed',
                        ),
                        'minLength' => 1,
                        'type' => 'string',
                      ),
                    ),
                    'required' => 
                    array (
                      0 => 'name',
                      1 => 'state',
                    ),
                    'type' => 'object',
                  ),
                  'statusID' => 
                  array (
                    'description' => 'Unique numeric ID of a status.',
                    'type' => 'integer',
                  ),
                  'statusNotes' => 
                  array (
                    'description' => 'Status update notes.',
                    'minLength' => 1,
                    'nullable' => true,
                    'type' => 'string',
                  ),
                  'type' => 
                  array (
                    'description' => 'Voting type for this idea: up-only or up and down.',
                    'enum' => 
                    array (
                      0 => 'up',
                      1 => 'up-down',
                    ),
                    'minLength' => 1,
                    'type' => 'string',
                  ),
                ),
                'required' => 
                array (
                  0 => 'statusNotes',
                  1 => 'statusID',
                  2 => 'status',
                  3 => 'type',
                ),
                'type' => 'object',
                'x-addon' => 'ideation',
              ),
            ),
            'type' => 'object',
          ),
          'body' => 
          array (
            'description' => 'The body of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'bookmarked' => 
          array (
            'description' => 'Whether or not the discussion is bookmarked by the current user.',
            'type' => 'boolean',
          ),
          'category' => 
          array (
            '$ref' => '#/components/schemas/CategoryFragment',
          ),
          'categoryID' => 
          array (
            'description' => 'The category the discussion is in.',
            'type' => 'integer',
          ),
          'closed' => 
          array (
            'description' => 'Whether the discussion is closed or open.',
            'type' => 'boolean',
          ),
          'countComments' => 
          array (
            'description' => 'The number of comments on the discussion.',
            'type' => 'integer',
          ),
          'countUnread' => 
          array (
            'description' => 'The number of unread comments.',
            'type' => 'integer',
          ),
          'countViews' => 
          array (
            'description' => 'The number of views on the discussion.',
            'type' => 'integer',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the discussion was created.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'dateUpdated' => 
          array (
            'description' => 'When the discussion was last updated.',
            'format' => 'date-time',
            'nullable' => true,
            'type' => 'string',
          ),
          'discussionID' => 
          array (
            'description' => 'The ID of the discussion.',
            'type' => 'integer',
          ),
          'groupID' => 
          array (
            'x-addon' => 'groups',
            'description' => 'The group the discussion is in.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'insertUser' => 
          array (
            '$ref' => '#/components/schemas/UserFragment',
          ),
          'insertUserID' => 
          array (
            'description' => 'The user that created the discussion.',
            'type' => 'integer',
          ),
          'lastPost' => 
          array (
            '$ref' => '#/components/schemas/PostFragment',
          ),
          'lastUser' => 
          array (
            '$ref' => '#/components/schemas/UserFragment',
          ),
          'name' => 
          array (
            'description' => 'The title of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'pinLocation' => 
          array (
            'description' => 'The location for the discussion, if pinned. "category" are pinned to their own category. "recent" are pinned to the recent discussions list, as well as their own category.',
            'enum' => 
            array (
              0 => 'category',
              1 => 'recent',
            ),
            'minLength' => 1,
            'nullable' => true,
            'type' => 'string',
          ),
          'pinned' => 
          array (
            'description' => 'Whether or not the discussion has been pinned.',
            'type' => 'boolean',
          ),
          'reactions' => 
          array (
            'items' => 
            array (
              'properties' => 
              array (
                'class' => 
                array (
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'count' => 
                array (
                  'type' => 'integer',
                ),
                'name' => 
                array (
                  'minLength' => 1,
                  'type' => 'string',
                ),
                'tagID' => 
                array (
                  'type' => 'integer',
                ),
                'urlcode' => 
                array (
                  'minLength' => 1,
                  'type' => 'string',
                ),
              ),
              'required' => 
              array (
                0 => 'tagID',
                1 => 'urlcode',
                2 => 'name',
                3 => 'class',
                4 => 'count',
              ),
              'type' => 'object',
            ),
            'type' => 'array',
            'x-addon' => 'reactions',
          ),
          'score' => 
          array (
            'description' => 'Total points associated with this post.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'sink' => 
          array (
            'description' => 'Whether or not the discussion has been sunk.',
            'type' => 'boolean',
          ),
          'type' => 
          array (
            'description' => 'The type of this discussion if any.',
            'minLength' => 1,
            'nullable' => true,
            'type' => 'string',
          ),
          'unread' => 
          array (
            'description' => 'Whether or not the discussion should have an unread indicator.',
            'type' => 'boolean',
          ),
          'url' => 
          array (
            'description' => 'The full URL to the discussion.',
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'discussionID',
          1 => 'type',
          2 => 'name',
          3 => 'body',
          4 => 'categoryID',
          5 => 'dateInserted',
          6 => 'dateUpdated',
          7 => 'insertUserID',
          8 => 'pinLocation',
          9 => 'closed',
          10 => 'sink',
          11 => 'countComments',
          12 => 'countViews',
          13 => 'score',
          14 => 'bookmarked',
          15 => 'unread',
          16 => 'attributes',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'DiscussionGetEdit' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The body of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'categoryID' => 
          array (
            'description' => 'The category the discussion is in.',
            'type' => 'integer',
          ),
          'closed' => 
          array (
            'description' => 'Whether the discussion is closed or open.',
            'type' => 'boolean',
          ),
          'discussionID' => 
          array (
            'description' => 'The ID of the discussion.',
            'type' => 'integer',
          ),
          'format' => 
          array (
            'description' => 'The input format of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'groupID' => 
          array (
            'x-addon' => 'groups',
            'description' => 'The group the discussion is in.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'name' => 
          array (
            'description' => 'The title of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'pinLocation' => 
          array (
            'description' => 'The location for the discussion, if pinned. "category" are pinned to their own category.
"recent" are pinned to the recent discussions list, as well as their own category.
',
            'enum' => 
            array (
              0 => 'category',
              1 => 'recent',
            ),
            'minLength' => 1,
            'nullable' => true,
            'type' => 'string',
          ),
          'pinned' => 
          array (
            'description' => 'Whether or not the discussion has been pinned.',
            'type' => 'boolean',
          ),
          'sink' => 
          array (
            'description' => 'Whether or not the discussion has been sunk.',
            'type' => 'boolean',
          ),
        ),
        'required' => 
        array (
          0 => 'discussionID',
          1 => 'name',
          2 => 'body',
          3 => 'format',
          4 => 'categoryID',
          5 => 'sink',
          6 => 'closed',
          7 => 'pinned',
          8 => 'pinLocation',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'DiscussionPost' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The body of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'categoryID' => 
          array (
            'description' => 'The category the discussion is in.',
            'type' => 'integer',
          ),
          'closed' => 
          array (
            'description' => 'Whether the discussion is closed or open.',
            'type' => 'boolean',
          ),
          'format' => 
          array (
            'description' => 'The input format of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'groupID' => 
          array (
            'x-addon' => 'groups',
            'description' => 'The group the discussion is in.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'name' => 
          array (
            'description' => 'The title of the discussion.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'pinLocation' => 
          array (
            'description' => 'The location for the discussion, if pinned. "category" are pinned to their own category. "recent" are pinned to the recent discussions list, as well as their own category.',
            'enum' => 
            array (
              0 => 'category',
              1 => 'recent',
            ),
            'minLength' => 1,
            'nullable' => true,
            'type' => 'string',
          ),
          'pinned' => 
          array (
            'description' => 'Whether or not the discussion has been pinned.',
            'type' => 'boolean',
          ),
          'sink' => 
          array (
            'description' => 'Whether or not the discussion has been sunk.',
            'type' => 'boolean',
          ),
        ),
        'required' => 
        array (
          0 => 'name',
          1 => 'body',
          2 => 'format',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'DraftPatch' => 
      array (
        'type' => 'object',
        'properties' => 
        array (
          'attributes' => 
          array (
            'description' => 'A free-form object containing all custom data for this draft.',
            'type' => 'object',
          ),
          'parentRecordID' => 
          array (
            'description' => 'The unique ID of the intended parent to this record.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'recordType' => 
          array (
            'description' => 'The type of record associated with this draft.',
            'enum' => 
            array (
              0 => 'comment',
              1 => 'discussion',
            ),
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'x-addon' => 'dashboard',
      ),
      'DraftPost' => 
      array (
        'type' => 'object',
        'properties' => 
        array (
          'attributes' => 
          array (
            'description' => 'A free-form object containing all custom data for this draft.',
            'type' => 'object',
          ),
          'parentRecordID' => 
          array (
            'description' => 'The unique ID of the intended parent to this record.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'recordType' => 
          array (
            'description' => 'The type of record associated with this draft.',
            'enum' => 
            array (
              0 => 'comment',
              1 => 'discussion',
            ),
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'recordType',
          1 => 'attributes',
        ),
        'x-addon' => 'dashboard',
      ),
      'Locale' => 
      array (
        'properties' => 
        array (
          'localeID' => 
          array (
            'description' => 'The key of the locale addon.',
            'minLength' => 1,
            'type' => 'string',
            'example' => 'vf_fr_CA,',
          ),
          'localeKey' => 
          array (
            'description' => 'The normalized key of the locale without any regional modifier.',
            'type' => 'string',
            'example' => 'fr',
          ),
          'regionalKey' => 
          array (
            'description' => 'The normalized key of the locale with a regional modifier if it exists.',
            'type' => 'string',
            'example' => 'fr_CA',
          ),
          'displayNames' => 
          array (
            'type' => 'object',
            'description' => 'Translatable names of the',
            'example' => 
            array (
              'en' => 'French',
              'fr' => 'Français',
              'de' => 'Französisch',
            ),
          ),
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'MediaItemPatch' => 
      array (
        'properties' => 
        array (
          'foreignID' => 
          array (
            'description' => 'Unique ID of the resource this media item will be attached to.',
            'type' => 'integer',
          ),
          'foreignType' => 
          array (
            'description' => 'Type of resource the media item will be attached to (e.g. comment).',
            'enum' => 
            array (
              0 => 'embed',
              1 => 'comment',
              2 => 'discussion',
            ),
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'foreignType',
          1 => 'foreignID',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'Message' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The body of the message.',
            'maxLength' => 2000,
            'minLength' => 1,
            'type' => 'string',
          ),
          'conversationID' => 
          array (
            'description' => 'The ID of the conversation.',
            'type' => 'integer',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the message was created.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'insertUser' => 
          array (
            '$ref' => '#/components/schemas/UserFragment',
          ),
          'insertUserID' => 
          array (
            'description' => 'The user that created the message.',
            'type' => 'integer',
          ),
          'messageID' => 
          array (
            'description' => 'The ID of the message.',
            'type' => 'integer',
          ),
        ),
        'required' => 
        array (
          0 => 'messageID',
          1 => 'conversationID',
          2 => 'body',
          3 => 'insertUserID',
          4 => 'dateInserted',
        ),
        'type' => 'object',
        'x-addon' => 'conversations',
      ),
      'MessagePost' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The body of the message.',
            'maxLength' => 2000,
            'minLength' => 1,
            'type' => 'string',
          ),
          'conversationID' => 
          array (
            'description' => 'The ID of the conversation.',
            'type' => 'integer',
          ),
          'format' => 
          array (
            'description' => 'The input format of the record.',
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'conversationID',
          1 => 'body',
        ),
        'type' => 'object',
        'x-addon' => 'conversations',
      ),
      'NotificationSchema' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The notification text. This contains some HTML, but only <b> tags.',
            'type' => 'string',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the notification was first made.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'dateUpdated' => 
          array (
            'description' => 'When the notification was last updated.

Notifications on the same record will group together into a single notification, updating just the dateUpdated property.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'notificationID' => 
          array (
            'description' => 'A unique ID to identify the notification.',
            'type' => 'integer',
          ),
          'photoUrl' => 
          array (
            'description' => 'An avatar or thumbnail associated with the notification.',
            'nullable' => true,
            'type' => 'string',
          ),
          'read' => 
          array (
            'description' => 'Whether or not the notification has been seen.',
            'type' => 'boolean',
          ),
          'url' => 
          array (
            'description' => 'The target of the notification.',
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'notificationID',
          1 => 'body',
          2 => 'photoUrl',
          3 => 'url',
          4 => 'dateInserted',
          5 => 'dateUpdated',
          6 => 'read',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'PermissionFragment' => 
      array (
        'properties' => 
        array (
          'id' => 
          array (
            'type' => 'integer',
          ),
          'permissions' => 
          array (
            'type' => 'object',
          ),
          'type' => 
          array (
            'enum' => 
            array (
              0 => 'global',
              1 => 'category',
            ),
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'type',
          1 => 'permissions',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'PostFragment' => 
      array (
        'properties' => 
        array (
          'commentID' => 
          array (
            'description' => 'The comment ID of the post, if any.',
            'type' => 'integer',
          ),
          'dateInserted' => 
          array (
            'description' => 'The date of the post.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'discussionID' => 
          array (
            'description' => 'The discussion ID of the post.',
            'type' => 'integer',
          ),
          'insertUser' => 
          array (
            '$ref' => '#/components/schemas/UserFragment',
          ),
          'insertUserID' => 
          array (
            'description' => 'The author of the post.',
            'type' => 'integer',
          ),
          'name' => 
          array (
            'description' => 'The title of the post.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'url' => 
          array (
            'description' => 'The URL of the post.',
            'minLength' => 1,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'name',
          1 => 'url',
          2 => 'dateInserted',
          3 => 'insertUserID',
        ),
        'type' => 'object',
        'x-addon' => 'vanilla',
      ),
      'Role' => 
      array (
        'properties' => 
        array (
          'canSession' => 
          array (
            'description' => 'Can users in this role start a session?',
            'type' => 'boolean',
          ),
          'deletable' => 
          array (
            'description' => 'Is the role deletable?',
            'type' => 'boolean',
          ),
          'description' => 
          array (
            'description' => 'Description of the role.',
            'minLength' => 0,
            'nullable' => true,
            'type' => 'string',
          ),
          'name' => 
          array (
            'description' => 'Name of the role.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'permissions' => 
          array (
            'items' => 
            array (
              '$ref' => '#/components/schemas/PermissionFragment',
            ),
            'type' => 'array',
          ),
          'personalInfo' => 
          array (
            'description' => 'Is membership in this role personal information?',
            'type' => 'boolean',
          ),
          'roleID' => 
          array (
            'description' => 'ID of the role.',
            'type' => 'integer',
          ),
          'type' => 
          array (
            'description' => 'Default type of this role.',
            'minLength' => 0,
            'nullable' => true,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'roleID',
          1 => 'name',
          2 => 'description',
          3 => 'type',
          4 => 'deletable',
          5 => 'canSession',
          6 => 'personalInfo',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'RoleFragment' => 
      array (
        'type' => 'object',
        'properties' => 
        array (
          'name' => 
          array (
            'description' => 'Name of the role.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'roleID' => 
          array (
            'description' => 'ID of the role.',
            'type' => 'integer',
          ),
        ),
        'required' => 
        array (
          0 => 'roleID',
          1 => 'name',
        ),
        'x-addon' => 'dashboard',
      ),
      'RolePost' => 
      array (
        'properties' => 
        array (
          'canSession' => 
          array (
            'description' => 'Can users in this role start a session?',
            'type' => 'boolean',
          ),
          'deletable' => 
          array (
            'description' => 'Is the role deletable?',
            'type' => 'boolean',
          ),
          'description' => 
          array (
            'description' => 'Description of the role.',
            'minLength' => 0,
            'nullable' => true,
            'type' => 'string',
          ),
          'name' => 
          array (
            'description' => 'Name of the role.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'permissions' => 
          array (
            'items' => 
            array (
              '$ref' => '#/components/schemas/PermissionFragment',
            ),
            'type' => 'array',
          ),
          'personalInfo' => 
          array (
            'description' => 'Is membership in this role personal information?',
            'type' => 'boolean',
          ),
          'type' => 
          array (
            'description' => 'Default type of this role.',
            'minLength' => 0,
            'nullable' => true,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'name',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'SearchResult' => 
      array (
        'properties' => 
        array (
          'body' => 
          array (
            'description' => 'The content of the record.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'categoryID' => 
          array (
            'description' => 'The category containing the record.',
            'type' => 'integer',
          ),
          'commentID' => 
          array (
            'description' => 'The id of the comment.',
            'type' => 'integer',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the record was created.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'dateUpdated' => 
          array (
            'description' => 'When the user was updated.',
            'format' => 'date-time',
            'nullable' => true,
            'type' => 'string',
          ),
          'discussionID' => 
          array (
            'description' => 'The id of the discussion.',
            'type' => 'integer',
          ),
          'groupID' => 
          array (
            'description' => 'The id of the group or the id of the group containing the record.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'insertUserID' => 
          array (
            'description' => 'The user that created the record.',
            'type' => 'integer',
          ),
          'insertUser' => 
          array (
            '$ref' => '#/components/schemas/UserFragment',
          ),
          'name' => 
          array (
            'description' => 'The title of the record. A comment would be "RE: {DiscussionTitle}".',
            'minLength' => 1,
            'type' => 'string',
          ),
          'recordID' => 
          array (
            'description' => 'The identifier of the record.',
            'type' => 'integer',
          ),
          'recordType' => 
          array (
            'description' => 'The main type of record.',
            'enum' => 
            array (
              0 => 'discussion',
              1 => 'comment',
              2 => 'group',
            ),
            'minLength' => 1,
            'type' => 'string',
          ),
          'score' => 
          array (
            'description' => 'Score of the record.',
            'type' => 'integer',
          ),
          'type' => 
          array (
            'description' => 'Sub-type of the discussion.',
            'enum' => 
            array (
              0 => 'discussion',
              1 => 'comment',
              2 => 'question',
              3 => 'group',
            ),
            'minLength' => 1,
            'type' => 'string',
          ),
          'updateUserID' => 
          array (
            'description' => 'The user that updated the record.',
            'nullable' => true,
            'type' => 'integer',
          ),
        ),
        'required' => 
        array (
          0 => 'recordID',
          1 => 'recordType',
          2 => 'type',
          3 => 'name',
          4 => 'body',
          5 => 'score',
          6 => 'insertUserID',
          7 => 'dateInserted',
          8 => 'updateUserID',
          9 => 'dateUpdated',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'Theme' => 
      array (
        'properties' => 
        array (
          'assets' => 
          array (
            '$ref' => '#/components/schemas/ThemeAssets',
          ),
          'type' => 
          array (
            'type' => 'string',
            'enum' => 
            array (
              0 => 'themeFile',
            ),
          ),
          'themeID' => 
          array (
            'type' => 'integer',
          ),
          'version' => 
          array (
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'assets',
          1 => 'type',
          2 => 'themeID',
          3 => 'version',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeAssetNotFound' => 
      array (
        'properties' => 
        array (
          'description' => 
          array (
            'description' => 'Verbose description of the error.',
            'nullable' => true,
            'type' => 'string',
          ),
          'message' => 
          array (
            'description' => 'Short description of the error.',
            'type' => 'string',
          ),
          'status' => 
          array (
            'description' => 'Status code of the error response.',
            'type' => 'integer',
          ),
        ),
        'required' => 
        array (
          0 => 'description',
          1 => 'message',
          2 => 'status',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeAssets' => 
      array (
        'description' => 'Assets to include in a page as part of the theme.',
        'properties' => 
        array (
          'header' => 
          array (
            '$ref' => '#/components/schemas/ThemeHeaderAsset',
          ),
          'footer' => 
          array (
            '$ref' => '#/components/schemas/ThemeFooterAsset',
          ),
          'fonts' => 
          array (
            '$ref' => '#/components/schemas/ThemeFontsAsset',
          ),
          'javascript' => 
          array (
            'description' => 'An absolute URL to the theme\'s JavaScript file.',
            'type' => 'string',
          ),
          'scripts' => 
          array (
            '$ref' => '#/components/schemas/ThemeScriptsAsset',
          ),
          'styles' => 
          array (
            'description' => 'An absolute URL to the theme\'s stylesheet.',
            'type' => 'string',
          ),
          'variables' => 
          array (
            '$ref' => '#/components/schemas/ThemeVariablesAsset',
          ),
          'logo' => 
          array (
            '$ref' => '#/components/schemas/ThemeLogoAsset',
          ),
          'mobileLogo' => 
          array (
            '$ref' => '#/components/schemas/ThemeMobileLogoAsset',
          ),
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeFont' => 
      array (
        'description' => 'An external font resource.',
        'properties' => 
        array (
          'fallbacks' => 
          array (
            'type' => 'string',
            'nullable' => true,
          ),
          'name' => 
          array (
            'type' => 'string',
          ),
          'type' => 
          array (
            'enum' => 
            array (
              0 => 'url',
            ),
            'type' => 'string',
          ),
          'url' => 
          array (
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'fallbacks',
          1 => 'name',
          2 => 'type',
          3 => 'url',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeFontsAsset' => 
      array (
        'description' => 'A collection of external font resources.',
        'properties' => 
        array (
          'data' => 
          array (
            'type' => 'array',
            'items' => 
            array (
              '$ref' => '#/components/schemas/ThemeFont',
              'type' => 'object',
            ),
          ),
        ),
        'required' => 
        array (
          0 => 'data',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeFooterAsset' => 
      array (
        'description' => 'Custom footer HTML.',
        'properties' => 
        array (
          'data' => 
          array (
            'type' => 'string',
          ),
          'type' => 
          array (
            'type' => 'string',
            'enum' => 
            array (
              0 => 'html',
            ),
          ),
        ),
        'required' => 
        array (
          0 => 'data',
          1 => 'type',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeHeaderAsset' => 
      array (
        'description' => 'Custom header HTML.',
        'properties' => 
        array (
          'data' => 
          array (
            'type' => 'string',
          ),
          'type' => 
          array (
            'type' => 'string',
            'enum' => 
            array (
              0 => 'html',
            ),
          ),
        ),
        'required' => 
        array (
          0 => 'data',
          1 => 'type',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeLogoAsset' => 
      array (
        'description' => 'Site logo to be displayed in the theme.',
        'properties' => 
        array (
          'url' => 
          array (
            'type' => 'string',
          ),
          'type' => 
          array (
            'type' => 'string',
            'enum' => 
            array (
              0 => 'image',
            ),
          ),
        ),
        'required' => 
        array (
          0 => 'url',
          1 => 'type',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeMobileLogoAsset' => 
      array (
        'description' => 'Site logo to be displayed in the theme when viewed on a mobile device.',
        'properties' => 
        array (
          'url' => 
          array (
            'type' => 'string',
          ),
          'type' => 
          array (
            'type' => 'string',
            'enum' => 
            array (
              0 => 'image',
            ),
          ),
        ),
        'required' => 
        array (
          0 => 'url',
          1 => 'type',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeScript' => 
      array (
        'properties' => 
        array (
          'url' => 
          array (
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'url',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeScriptsAsset' => 
      array (
        'description' => 'External script files to be included.',
        'properties' => 
        array (
          'data' => 
          array (
            'type' => 'array',
            'items' => 
            array (
              '$ref' => '#/components/schemas/ThemeScript',
            ),
          ),
          'type' => 
          array (
            'type' => 'string',
            'enum' => 
            array (
              0 => 'data',
            ),
          ),
        ),
        'required' => 
        array (
          0 => 'data',
          1 => 'type',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'ThemeVariablesAsset' => 
      array (
        'description' => 'A collection of variables intended to be used by theme.',
        'properties' => 
        array (
          'data' => 
          array (
            'type' => 'object',
          ),
          'type' => 
          array (
            'type' => 'string',
            'enum' => 
            array (
              0 => 'json',
            ),
          ),
        ),
        'required' => 
        array (
          0 => 'data',
          1 => 'type',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'Token' => 
      array (
        'properties' => 
        array (
          'accessToken' => 
          array (
            'description' => 'A signed version of the token.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'accessTokenID' => 
          array (
            'description' => 'The unique numeric ID.',
            'type' => 'integer',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the token was generated.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'name' => 
          array (
            'description' => 'A user-specified label.',
            'minLength' => 1,
            'nullable' => true,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'accessTokenID',
          1 => 'name',
          2 => 'accessToken',
          3 => 'dateInserted',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'UploadedFile' => 
      array (
        'type' => 'string',
        'format' => 'binary',
        'x-addon' => 'dashboard',
      ),
      'User' => 
      array (
        'properties' => 
        array (
          'userID' => 
          array (
            'description' => 'ID of the user.',
            'type' => 'integer',
          ),
          'name' => 
          array (
            'description' => 'Name of the user.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'photoUrl' => 
          array (
            'description' => 'URL to the user photo.',
            'minLength' => 0,
            'nullable' => true,
            'type' => 'string',
          ),
          'email' => 
          array (
            'description' => 'Email address of the user.',
            'minLength' => 0,
            'type' => 'string',
          ),
          'roles' => 
          array (
            'items' => 
            array (
              '$ref' => '#/components/schemas/RoleFragment',
            ),
            'type' => 'array',
          ),
          'dateInserted' => 
          array (
            'description' => 'When the user was created.',
            'format' => 'date-time',
            'type' => 'string',
          ),
          'dateLastActive' => 
          array (
            'description' => 'Time the user was last active.',
            'format' => 'date-time',
            'nullable' => true,
            'type' => 'string',
          ),
          'dateUpdated' => 
          array (
            'description' => 'When the user was last updated.',
            'format' => 'date-time',
            'nullable' => true,
            'type' => 'string',
          ),
          'points' => 
          array (
            'description' => 'The total number of points the user has accumulated.',
            'type' => 'integer',
            'default' => 0,
          ),
          'emailConfirmed' => 
          array (
            'description' => 'Has the email address for the user been confirmed?',
            'type' => 'boolean',
          ),
          'hidden' => 
          array (
            'description' => 'Is this user hiding their online status?',
            'type' => 'boolean',
          ),
          'bypassSpam' => 
          array (
            'description' => 'Should submissions from this user bypass SPAM checks?',
            'type' => 'boolean',
          ),
          'banned' => 
          array (
            'description' => 'Is the user banned?',
            'type' => 'integer',
          ),
          'rank' => 
          array (
            'x-addon' => 'ranks',
            'properties' => 
            array (
              'name' => 
              array (
                'description' => 'Name of the rank.',
                'minLength' => 1,
                'type' => 'string',
              ),
              'rankID' => 
              array (
                'description' => 'Rank ID.',
                'type' => 'integer',
              ),
              'userTitle' => 
              array (
                'description' => 'Label that will display beside the user.',
                'minLength' => 1,
                'type' => 'string',
              ),
            ),
            'required' => 
            array (
              0 => 'rankID',
              1 => 'name',
              2 => 'userTitle',
            ),
            'type' => 'object',
          ),
          'rankID' => 
          array (
            'x-addon' => 'ranks',
            'description' => 'ID of the user rank.',
            'nullable' => true,
            'type' => 'integer',
          ),
          'showEmail' => 
          array (
            'description' => 'Is the email address visible to other users?',
            'type' => 'boolean',
          ),
        ),
        'required' => 
        array (
          0 => 'userID',
          1 => 'name',
          2 => 'email',
          3 => 'photoUrl',
          4 => 'points',
          5 => 'emailConfirmed',
          6 => 'showEmail',
          7 => 'bypassSpam',
          8 => 'banned',
          9 => 'dateInserted',
          10 => 'dateLastActive',
          11 => 'dateUpdated',
        ),
        'type' => 'object',
        'x-addon' => 'dashboard',
      ),
      'UserFragment' => 
      array (
        'type' => 'object',
        'properties' => 
        array (
          'userID' => 
          array (
            'description' => 'The ID of the user.',
            'type' => 'integer',
          ),
          'name' => 
          array (
            'description' => 'The username of the user.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'photoUrl' => 
          array (
            'description' => 'The URL of the user\'s avatar picture.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'dateLastActive' => 
          array (
            'description' => 'Time the user was last active.',
            'format' => 'date-time',
            'nullable' => true,
            'type' => 'string',
          ),
        ),
        'required' => 
        array (
          0 => 'userID',
          1 => 'name',
          2 => 'photoUrl',
          3 => 'dateLastActive',
        ),
        'x-addon' => 'dashboard',
      ),
      'UserPatch' => 
      array (
        'type' => 'object',
        'properties' => 
        array (
          'bypassSpam' => 
          array (
            'description' => 'Should submissions from this user bypass SPAM checks?',
            'type' => 'boolean',
          ),
          'email' => 
          array (
            'description' => 'Email address of the user.',
            'minLength' => 0,
            'type' => 'string',
          ),
          'emailConfirmed' => 
          array (
            'description' => 'Has the email address for this user been confirmed?',
            'type' => 'boolean',
          ),
          'name' => 
          array (
            'description' => 'Name of the user.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'photo' => 
          array (
            'description' => 'Raw photo field value from the user record.',
            'minLength' => 0,
            'nullable' => true,
            'type' => 'string',
          ),
          'roleID' => 
          array (
            'description' => 'Roles to set on the user.',
            'items' => 
            array (
              'type' => 'integer',
            ),
            'type' => 'array',
          ),
        ),
        'x-addon' => 'dashboard',
      ),
      'UserPost' => 
      array (
        'type' => 'object',
        'properties' => 
        array (
          'bypassSpam' => 
          array (
            'default' => false,
            'description' => 'Should submissions from this user bypass SPAM checks?',
            'type' => 'boolean',
          ),
          'email' => 
          array (
            'description' => 'Email address of the user.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'emailConfirmed' => 
          array (
            'default' => true,
            'description' => 'Has the email address for this user been confirmed?',
            'type' => 'boolean',
          ),
          'name' => 
          array (
            'description' => 'Name of the user.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'password' => 
          array (
            'description' => 'Password of the user.',
            'minLength' => 1,
            'type' => 'string',
          ),
          'photo' => 
          array (
            'description' => 'Raw photo field value from the user record.',
            'minLength' => 0,
            'nullable' => true,
            'type' => 'string',
          ),
          'roleID' => 
          array (
            'description' => 'Roles to set on the user.',
            'items' => 
            array (
              'type' => 'integer',
            ),
            'type' => 'array',
          ),
        ),
        'required' => 
        array (
          0 => 'name',
          1 => 'email',
          2 => 'password',
          3 => 'emailConfirmed',
          4 => 'bypassSpam',
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    'parameters' => 
    array (
      'CacheBusterParameter' => 
      array (
        'name' => 'etag',
        'in' => 'query',
        'description' => 'Whether or not output is cached.
',
        'schema' => 
        array (
          'type' => 'string',
        ),
        'x-addon' => 'dashboard',
      ),
      'DateInserted' => 
      array (
        'name' => 'dateInserted',
        'in' => 'query',
        'description' => 'Filter by insert date. See [date filters](https://docs.vanillaforums.com/help/apiv2/date-filters/).
',
        'schema' => 
        array (
          'format' => 'date-filter',
          'type' => 'string',
        ),
        'x-addon' => 'dashboard',
      ),
      'DateUpdated' => 
      array (
        'name' => 'dateUpdated',
        'in' => 'query',
        'description' => 'Filter by update date. See [date filters](https://docs.vanillaforums.com/help/apiv2/date-filters/).
',
        'schema' => 
        array (
          'format' => 'date-filter',
          'type' => 'string',
        ),
        'x-addon' => 'dashboard',
      ),
      'LocaleCodeParameter' => 
      array (
        'name' => 'locale',
        'in' => 'path',
        'description' => 'The locale code requested.',
        'required' => true,
        'schema' => 
        array (
          'type' => 'string',
          'pattern' => '[a-zA-Z0-9-]+',
        ),
        'x-addon' => 'dashboard',
      ),
      'Page' => 
      array (
        'name' => 'page',
        'in' => 'query',
        'description' => 'Page number. See [Pagination](https://docs.vanillaforums.com/apiv2/#pagination).
',
        'schema' => 
        array (
          'type' => 'integer',
          'default' => 1,
          'minimum' => 1,
        ),
        'x-addon' => 'dashboard',
      ),
    ),
    'requestBodies' => 
    array (
      'CategoryPost' => 
      array (
        'content' => 
        array (
          'application/json' => 
          array (
            'schema' => 
            array (
              '$ref' => '#/components/schemas/CategoryPost',
            ),
          ),
        ),
        'required' => true,
        'x-addon' => 'vanilla',
      ),
      'CommentPost' => 
      array (
        'content' => 
        array (
          'application/json' => 
          array (
            'schema' => 
            array (
              '$ref' => '#/components/schemas/CommentPost',
            ),
          ),
        ),
        'required' => true,
        'x-addon' => 'vanilla',
      ),
      'ConversationPost' => 
      array (
        'content' => 
        array (
          'application/json' => 
          array (
            'schema' => 
            array (
              '$ref' => '#/components/schemas/ConversationPost',
            ),
          ),
        ),
        'required' => true,
        'x-addon' => 'conversations',
      ),
      'NotificationSchema' => 
      array (
        'content' => 
        array (
          'application/json' => 
          array (
            'schema' => 
            array (
              '$ref' => '#/components/schemas/NotificationSchema',
            ),
          ),
        ),
        'required' => true,
        'x-addon' => 'dashboard',
      ),
      'PermissionFragmentArray' => 
      array (
        'content' => 
        array (
          'application/json' => 
          array (
            'schema' => 
            array (
              'items' => 
              array (
                '$ref' => '#/components/schemas/PermissionFragment',
              ),
              'type' => 'array',
            ),
          ),
        ),
        'required' => true,
        'x-addon' => 'dashboard',
      ),
      'RolePost' => 
      array (
        'content' => 
        array (
          'application/json' => 
          array (
            'schema' => 
            array (
              '$ref' => '#/components/schemas/RolePost',
            ),
          ),
        ),
        'required' => true,
        'x-addon' => 'dashboard',
      ),
    ),
  ),
  'servers' => 
  array (
    0 => 
    array (
      'url' => 'https://forum.codetigers.org/api/v2',
    ),
  ),
);
