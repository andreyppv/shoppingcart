//swichery
{
    var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html, {
            color: '#10CFBD'
        });
    });
    var changeCheckbox = document.querySelector('.js-check-change');
    var changeField = document.querySelector('.js-check-change-field');

    changeCheckbox.onchange = function() {
        if ($('.js-check-change').is(":checked")) {
            changeField.innerHTML = 'SUBSCRIBED';
        } else {
            changeField.innerHTML = 'UNSUBSCRIBED';
        }
    };
}

{
    // Required for drag and drop file access
    jQuery.event.props.push('dataTransfer');

    // IIFE to prevent globals
    (function() {
        var s;
        var Avatar = {
            settings: {
                bod: $("body"),
                img: $("#avatar-img"),
                fileInput: $("#avatar-file")
            },

            init: function() {
                s = Avatar.settings;
                Avatar.bindUIActions();
            },
            bindUIActions: function() {
                var timer;
                s.fileInput.on('change', function(event) {
                    Avatar.handleDrop(event.target.files);
                });
            },

            showDroppableArea: function() {
                s.bod.addClass("droppable");
            },

            hideDroppableArea: function() {
                s.bod.removeClass("droppable");
            },

            handleDrop: function(files) {
                Avatar.hideDroppableArea();

                // Multiple files can be dropped. Lets only deal with the "first" one.
                var file = files[0];
                if (typeof file !== 'undefined' && file.type.match('image.*')) {
                    Avatar.resizeImage(file, 90, function(data) {
                        Avatar.placeImage(data);
                    });
                } else {
                    alert("That file wasn't an image.");
                }
            },

            resizeImage: function(file, size, callback) {
                var fileTracker = new FileReader;
                fileTracker.onload = function() {
                    Resample(
                        this.result,
                        size,
                        size,
                        callback
                    );
                }
                fileTracker.readAsDataURL(file);

                fileTracker.onabort = function() {
                    alert("The upload was aborted.");
                }
                fileTracker.onerror = function() {
                    alert("An error occured while reading the file.");
                }
            },

            placeImage: function(data) {
                s.img.attr("src", data);
            }
        }

        Avatar.init();
    })();
}

$('#update-profile-but').click(function() {
    $('#avatar-file').trigger('click');
});