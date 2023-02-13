<div class="form-floating mb-3">
    <input type="search" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="autoComplete" value="{{ $value }}" dir="ltr" spellcheck=false
    autocorrect="off" autocomplete="off" autocapitalize="off">
    <label for="{{ $name }}">{{ $label }}@error($name) <span class="text-danger">{{ $message }}</span>@enderror</label>
    <script>
        const autoCompleteJS = new autoComplete({
            selector: "#autoComplete",
            placeHolder: "{{ $placeholder }}",
            threshold: 2,
            debounce: 300,
            wrapper: false,
            data: {
                src: async (query) => {
                    try {
                        const source = await fetch(`{{ $url }}/${query}`);
                        const data = await source.json();
                        return data;
                    } catch (error) {
                        return error;
                    }
                },
            },
            resultsList: {
                element: (list, data) => {
                    if (!data.results.length) {
                        const message = document.createElement("div");
                        message.setAttribute("class", "no_result");
                        message.innerHTML = `<span>No se encontraron resultados para: "${data.query}"</span>`;
                        list.prepend(message);
                    }
                },
                noResults: true,
                class: "list-group autoComplete",
                tag: "ul",
            },
            resultItem: {
                tag: "li",
                class: "list-group-item list-group-item-action",
            },
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        autoCompleteJS.input.value = selection;
                    }
                }
            }
        });
    </script>
</div>