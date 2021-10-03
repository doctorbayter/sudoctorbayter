<x-admin-layout>

    <x-slot name="recipe">
        {{$recipe->slug}}
    </x-slot>

    @include('admin.recipes.partials.info')

    @section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>

    //Slug automático
    document.getElementById("name").addEventListener('keyup', slugChange);

    function slugChange(){
        name = document.getElementById("name").value;
        document.getElementById("slug").value = string_to_slug(name);

    }

    function string_to_slug (str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes
        return str;
    }


    //Cambiar , por .
    document.getElementById("carbs").addEventListener('keyup', comaChange);

    function comaChange(){

        document.getElementById("carbs").value = document.getElementById("carbs").value.replace(/,/g, '.');

    }

    //CKEDITOR

    ClassicEditor
        .create( document.querySelector( '#descripcion' ), {
            toolbar: [ 'heading', '|', 'bold' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Texto normal', class: 'ck-heading_paragraph' },
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );

    //Cambiar imagen
    document.getElementById("image").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };

        reader.readAsDataURL(file);
    }

    </script>
    @stop
</x-admin-layout>
