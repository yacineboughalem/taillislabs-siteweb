
<script src="/admin/js/plugins/tinymce/tinymce.min.js"></script>
<script src="/admin/js/plugins/choices.min.js"></script>
<script src="/admin/js/plugins/sweetalert2.all.min.js"></script>
<script src="/admin/js/plugins/sweetalert2.all.min.js"></script>
<script src="/admin/js/plugins/ac-alert.js"></script>
<script src="/admin/js/plugins/simple-datatables.js"></script>
<script>
    const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
        sortable: false,
        perPage: 10
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var genericExamples = document.querySelectorAll('[data-trigger]');
        for (i = 0; i < genericExamples.length; ++i) {
            var element = genericExamples[i];
            new Choices(element, {
                placeholderValue: 'This is a placeholder set in the config',
                searchPlaceholderValue: 'This is a search placeholder'
            });
        }
    });

    // tinymce.init({
    //     height: '400',
    //     selector: '#pc-tinymce',
    //     content_style: 'body { font-family: "Inter", sans-serif; }',
    //     menubar: false,
    //     toolbar: [
    //         'styleselect fontselect fontsizeselect',
    //         'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
    //         'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'
    //     ],
    //     plugins: 'advlist autolink link image lists charmap print preview code'
    // });




    // 

    let elems = document.getElementsByClassName('confirmation');
    let confirmIt = function(e, idSubmit = null) {
        let conferm = confirm("{{ __('Are you sure to remove') }}");
        if (!conferm) {
            e.preventDefault();
        }
        if (idSubmit) {
            document.getElementById(idSubmit).submit();
        }
        return false;
    };
    for (let i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }




    $(document).ready(function() {
        $('._delete_data').click(function(e) {
            var data_id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.value) {
                    $(document).find('#delete_from_' + data_id).submit();
                }
            })
        });
    });
</script>


{{-- File Manager --}}
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>



<script>
    var editor_config = {
        path_absolute: "/panel/",
        selector: '.textarea',
        height: 700,
        relative_urls: false,
        plugins: [
            'codesample code', 'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist',
            'export',
            'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
            'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount', 'code'
        ],
        // plugins: 'codesample code advlist',
        toolbar: 'codesample code  advlist a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents undo redo | casechange blocks | bold italic backcolor | \
  alignleft aligncenter alignright alignjustify | \
  bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        codesample_global_prismjs: true,
        codesample_languages: [{
                text: 'HTML/XML',
                value: 'markup'
            },
            {
                text: 'JavaScript',
                value: 'javascript'
            },
            {
                text: 'CSS',
                value: 'css'
            },
            {
                text: 'PHP',
                value: 'php'
            },
            {
                text: 'Ruby',
                value: 'ruby'
            },
            {
                text: 'Python',
                value: 'python'
            },
            {
                text: 'Java',
                value: 'java'
            },
            {
                text: 'C++',
                value: 'cpp'
            }
        ],
        // content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        file_picker_callback: function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = '/panel/media?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>