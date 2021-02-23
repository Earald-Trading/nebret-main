<div id="{{ $toolbar }}">
    <span class="ql-formats">
        <select class="ql-size">
            <option value="8px">8px</option>
            <option value="9px">9px</option>
            <option value="10px">10px</option>
            <option value="11px" selected>11px</option>
            <option value="12px">12px</option>
            <option value="14px">14px</option>
            <option value="16px">16px</option>
            <option value="20px">20px</option>
            <option value="24px">24px</option>
            <option value="32px">32px</option>
            <option value="42px">42px</option>
            <option value="54px">54px</option>
            <option value="68px">68px</option>
            <option value="84px">84px</option>
            <option value="98px">98px</option>
        </select>
        <select class="ql-font"></select>
        <select class="ql-color"></select>
    </span>
    <span class="ql-formats">
        <button class="ql-bold"></button>
        <button class="ql-italic"></button>
        <button class="ql-underline"></button>
        <button class="ql-strike"></button>
        <button class="ql-blockquote"></button>
    </span>
    <span class="ql-formats">
        <select class="ql-header">
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
            <option value="false"></option>
        </select>
    </span>
    <span class="ql-formats">
        <button class="ql-script" value="sub"></button>
        <button class="ql-script" value="super"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-list" value="ordered"></button>
        <button class="ql-list" value="bullet"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-align"></button>
        <button class="ql-align" value="center"></button>
        <button class="ql-align" value="right"></button>
    </span>
</div>

<!-- Create the editor container -->
<div id="{{ $editor }}" class="{{ $class ?? '' }}">
</div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    var formats = [
        'background',
        'bold',
        'color',
        'font',
        'code',
        'italic',
        'link',
        'size',
        'strike',
        'script',
        'underline',
        'blockquote',
        'header',
        'indent',
        'list',
        'align',
        'direction',
        'code-block',
        'formula'
    ];
    var ColorClass = Quill.import('attributors/class/color');
    var SizeStyle = Quill.import('attributors/style/size');
    var fontSizeStyle = Quill.import('attributors/style/size');
    Quill.register(ColorClass, true);
    Quill.register(SizeStyle, true);
    Quill.register(fontSizeStyle, true);
    var editor = new Quill('#{{ $editor }}', {
            modules: { toolbar: '#{{ $toolbar }}' },
            theme: 'snow',
            formats: formats
    });

    $('#{{ $form }}').submit(function(e) {
            var myEditor = document.querySelector('#editor')
            var html = myEditor.children[0].innerHTML
            $('#{{ $textarea }}').value = html;
            return true;
    });
</script>
