
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Syscover</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Langlocale" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Langlocale.html">Langlocale</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Langlocale_Libraries" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Langlocale/Libraries.html">Libraries</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Langlocale_Libraries_Miscellaneous" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Langlocale/Libraries/Miscellaneous.html">Miscellaneous</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Syscover_Langlocale_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Langlocale/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Langlocale_Middleware_SetLangLocaleUser" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Langlocale/Middleware/SetLangLocaleUser.html">SetLangLocaleUser</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Syscover_Langlocale_LanglocaleServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Syscover/Langlocale/LanglocaleServiceProvider.html">LanglocaleServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Syscover.html", "name": "Syscover", "doc": "Namespace Syscover"},{"type": "Namespace", "link": "Syscover/Langlocale.html", "name": "Syscover\\Langlocale", "doc": "Namespace Syscover\\Langlocale"},{"type": "Namespace", "link": "Syscover/Langlocale/Libraries.html", "name": "Syscover\\Langlocale\\Libraries", "doc": "Namespace Syscover\\Langlocale\\Libraries"},{"type": "Namespace", "link": "Syscover/Langlocale/Middleware.html", "name": "Syscover\\Langlocale\\Middleware", "doc": "Namespace Syscover\\Langlocale\\Middleware"},
            
            {"type": "Class", "fromName": "Syscover\\Langlocale", "fromLink": "Syscover/Langlocale.html", "link": "Syscover/Langlocale/LanglocaleServiceProvider.html", "name": "Syscover\\Langlocale\\LanglocaleServiceProvider", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Langlocale\\LanglocaleServiceProvider", "fromLink": "Syscover/Langlocale/LanglocaleServiceProvider.html", "link": "Syscover/Langlocale/LanglocaleServiceProvider.html#method_boot", "name": "Syscover\\Langlocale\\LanglocaleServiceProvider::boot", "doc": "&quot;Bootstrap the application services.&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Langlocale\\LanglocaleServiceProvider", "fromLink": "Syscover/Langlocale/LanglocaleServiceProvider.html", "link": "Syscover/Langlocale/LanglocaleServiceProvider.html#method_register", "name": "Syscover\\Langlocale\\LanglocaleServiceProvider::register", "doc": "&quot;Register the application services.&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Langlocale\\Libraries", "fromLink": "Syscover/Langlocale/Libraries.html", "link": "Syscover/Langlocale/Libraries/Miscellaneous.html", "name": "Syscover\\Langlocale\\Libraries\\Miscellaneous", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Langlocale\\Libraries\\Miscellaneous", "fromLink": "Syscover/Langlocale/Libraries/Miscellaneous.html", "link": "Syscover/Langlocale/Libraries/Miscellaneous.html#method_preferedLanguage", "name": "Syscover\\Langlocale\\Libraries\\Miscellaneous::preferedLanguage", "doc": "&quot;Determine which language out of an available set the user prefers most\n $available&lt;em&gt;languages, array with language-tag-strings (must be lowercase) that are available\n $http&lt;\/em&gt;accept&lt;em&gt;language, a HTTP&lt;\/em&gt;ACCEPT&lt;em&gt;LANGUAGE string (read from $&lt;\/em&gt;SERVER[&#039;HTTP&lt;em&gt;ACCEPT&lt;\/em&gt;LANGUAGE&#039;] if left out)&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Langlocale\\Libraries\\Miscellaneous", "fromLink": "Syscover/Langlocale/Libraries/Miscellaneous.html", "link": "Syscover/Langlocale/Libraries/Miscellaneous.html#method_getRealIp", "name": "Syscover\\Langlocale\\Libraries\\Miscellaneous::getRealIp", "doc": "&quot;Funci\u00f3n para obtener la IP real de un cliente&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Langlocale\\Middleware", "fromLink": "Syscover/Langlocale/Middleware.html", "link": "Syscover/Langlocale/Middleware/SetLangLocaleUser.html", "name": "Syscover\\Langlocale\\Middleware\\SetLangLocaleUser", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Langlocale\\Middleware\\SetLangLocaleUser", "fromLink": "Syscover/Langlocale/Middleware/SetLangLocaleUser.html", "link": "Syscover/Langlocale/Middleware/SetLangLocaleUser.html#method_handle", "name": "Syscover\\Langlocale\\Middleware\\SetLangLocaleUser::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


