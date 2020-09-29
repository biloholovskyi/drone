/*=================================*/
/* Section Parallax
/*=================================*/
var NtParallaxHandler = function($scope, $) {
    var target = $scope,
        sectionId = target.data("id"),
        settings = false,
        editMode = elementorFrontend.isEditMode();

    if (editMode) {
        settings = generateEditorSettings(sectionId);
    }

    if (!editMode || !settings) {
        return false;
    }

    if (settings[0] == "yes") {
        generateJarallax();
    }

    function generateEditorSettings(targetId) {
        var editorElements = null,
            sectionData = {},
            sectionMultiData = {},
            settings = [];

        if (!window.elementor.hasOwnProperty("elements")) {
            return false;
        }

        editorElements = window.elementor.elements;

        if (!editorElements.models) {
            return false;
        }

        $.each(editorElements.models, function(index, elem) {

            if (targetId == elem.id) {

                sectionData = elem.attributes.settings.attributes;

            } else if ( elem.id == target.closest(".elementor-top-section").data("id") ) {

                $.each(elem.attributes.elements.models, function(index, col) {
                    $.each(col.attributes.elements.models, function(index,subSec) {
                        sectionData = subSec.attributes.settings.attributes;
                    });
                });
            }
        });

        if (!sectionData.hasOwnProperty("nt_parallax_type") || "" == sectionData["nt_parallax_type"]) {
            return false;
        }

        settings.push(sectionData["nt_parallax_switcher"]);
        settings.push(sectionData["nt_parallax_type"]);
        settings.push(sectionData["nt_parallax_speed"]);
        settings.push(sectionData["nt_parallax_bg_size"]);
        settings.push("yes" == sectionData["nt_parallax_android_support"] ? 0 : 1);
        settings.push("yes" == sectionData["nt_parallax_ios_support"] ? 0 : 1);
        //settings.push(sectionData["nt_parallax_background_pos"]);


        if (0 !== settings.length) {
            return settings;
        }

        return false;
    }

    function responsiveParallax(android, ios) {
        switch (true || 1) {
            case android && ios:
                return /iPad|iPhone|iPod|Android/;
                break;
            case android && !ios:
                return /Android/;
                break;
            case !android && ios:
                return /iPad|iPhone|iPod/;
                break;
            case !android && !ios:
                return null;
        }
    }

    function generateJarallax() {

        setTimeout(function() {
            target.jarallax({
                type: settings[1],
                speed: settings[2],
                imgSize: settings[3],
                disableParallax: responsiveParallax(
                    1 == settings[4],
                    1 == settings[5]
                ),
                keepImg: true
            });
        }, 500);

    }


};

jQuery(window).on("elementor/frontend/init", function() {
    elementorFrontend.hooks.addAction(
        "frontend/element_ready/section",
        NtParallaxHandler
    );
});
