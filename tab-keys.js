/*global $, document */
// Wrapper function to avoid polluting window with globals
(function () {
    "use strict";

    // List of dom nodes to be tabbed. Note: order of selectors matter
    // NodeList er í grundini ein circular doubly linked list av lutum ið kunnu tabbast
    function NodeList(selectors) {
        var $domNodes = $(selectors.join(',')),
            currentNode = 0;

        $.each($domNodes, function (i, node) {
            var $node = $(node);
            $node.attr('tabindex', i)
                .click(function () {
                    currentNode = $(this).attr('tabindex');
                });
        });

        return {
            get: function () {
                currentNode = (currentNode + $domNodes.length) % $domNodes.length;
                return $($domNodes[currentNode]);
            },
            next: function () {
                currentNode += 1;
                return this.get();
            },
            prev: function () {
                currentNode -= 1;
                return this.get();
            }
        };

    }

    function focus($node) {
        if ($node.hasClass('tagedit-listelement')) {
            $node = $node.find('#tagedit-input')
                .removeAttr('disabled')
                .removeClass('tagedit-input-disabled');
        }
        if ($node.hasClass('jHtmlArea')) {
            $node = $node.find('iframe');
        }
        $node.focus();
    }

    function Tabber(tabsInOrder, domNode) {
        domNode = domNode || $(document);

        var TabKeyCode = 9,
            $nodes = new NodeList(tabsInOrder),
            isKeyCode = function (keyCode, fn) {
                return function (event) {
                    if (event.keyCode === keyCode) {
                        event.preventDefault();
                        fn($nodes[event.shiftKey ? 'prev' : 'next']());
                    }
                };
            };

        $(domNode).keydown(isKeyCode(TabKeyCode, focus));
        focus($nodes.get());
    }


    $(document).ready(function () {
        var tabber = new Tabber(['#p_title', '.tagedit-listelement', '.jHtmlArea']);
    });
}());
