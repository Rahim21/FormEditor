window.jsPDF = window.jspdf.jsPDF;
const doc = new jsPDF({
    orientation: "landscape",
    unit: "in",
    format: [4, 2],
});
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

const db = localStorage;

const _ = (el) => {
    return document.querySelector(el);
};

const getTpl = (element) => {
    return tpl[element];
};

const makeEditable = () => {
    let elements = document.querySelectorAll('.drop-element');
    let toArr = Array.prototype.slice.call(elements);
    Array.prototype.forEach.call(toArr, (obj, index) => {
        if (obj.querySelector('img')) {
            return false;
        } else {
            obj.addEventListener('click', (e) => {
                e.preventDefault();
                obj.children[0].setAttribute('contenteditable', '');
                obj.focus();
            });
            obj.children[0].addEventListener('blur', (e) => {
                e.preventDefault();
                obj.children[0].removeAttribute('contenteditable');
            });
        }
    });
};

const removeDivsToSave = () => {
    let elements = document.querySelectorAll('.drop-element');
    let toArr = Array.prototype.slice.call(elements);
    let html = '';
    Array.prototype.forEach.call(toArr, (obj, index) => {
        obj.children[0].removeAttribute('contenteditable');
        html += obj.innerHTML;
    });
    return html;
};

const tpl = {
    'header1': '<label>Entrez un label</label>',
    'header2': '<input class="form-control" name="text" placeholder="Entrez un texte"/>',
    'header3': '<textarea name="description" rows="10" cols="30">Entrez un texte sur plusieurs lignes</textarea>',
    'shortparagraph': '<select class="form-control" id="cars" name="select"><option value="volvo">Valeur1</option> <option value="saab">Valeur2</option> <option value="fiat">Valeur3</option> <option value="audi">Valeur4</option> </select>',
    'image': '<input type="file" name="file" id="inputGroupFile02">'
};

/**
 * init dragula
 *
 * @type  function
 */
const containers = [_('.box-left'), _('.box-rightsave')];
const drake = dragula(containers, {
    copy(el, source) {
        return source === _('.box-left');
    },
    accepts(el, target) {
        return target !== _('.box-left');
    }
});
dragula([document.getElementsByClassName('.drop-element')], {
    removeOnSpill: true
});


drake.on('out', (el, container) => {
    console.log(el)
    if (container == _('.box-rightsave')) {
        el.innerHTML = getTpl(el.getAttribute('data-tpl'));
        el.className = 'drop-element';
        if (el.getAttribute('data-tpl') != "image") {
            makeEditable();
        }
        db.setItem('savedData', _('.box-rightsave').innerHTML);
    }
    if (container == _('.box-left')) {
        el.innerHTML = el.getAttribute('data-title');
    }
});

if (typeof db.getItem('savedData') !== 'undefined') {
    _('.box-rightsave').innerHTML = db.getItem('savedData');
    makeEditable();
}
;

_('.reset').addEventListener('click', (e) => {

    e.preventDefault();
    db.removeItem('savedData');
    if (confirm('En êtes-vous sûr !?')) {
        _('.box-rightsave').innerHTML = '';
    }
});

_('.save').addEventListener('click', (e) => {
    e.preventDefault();
    var blob = new Blob([removeDivsToSave()], {
        type: 'text/html;charset=utf-8'
    });
    db.setItem('savedData', _('.box-rightsave').innerHTML);
});


//


$(document).ready(function () {
    // $(document).on("click","input[name=file]",function () {
    //     console.log($('.custom-file-input').click());
    //     // $(this)[0].trigger("click");
    //     // $(this).trigger("input[name=file]");
    //
    //
    // });

    $(document).on("dblclick", ".drop-element", function () {
        $(this).remove();
        db.removeItem('savedData');
        db.setItem('savedData', $("#contents-2").html())
    })
    setTimeout(function () {
        $(".close-message").hide();
    }, 2000)
    $(".form-submit").on("click", function (e) {
        e.preventDefault();
        $("#form-data").val(JSON.stringify($("#contents-2").html()));
        $("#form-builder").submit();
    });
    $(".save").on("click", function () {
        html2canvas(document.querySelector("#contents-2")).then(canvas => {
            document.body.appendChild(canvas)
            var myImage = canvas.toDataURL("image/jpeg,1.0");
            // Adjust width and height
            var imgWidth = (canvas.width * 120) / 650;
            var imgHeight = (canvas.height * 70) / 340;
            // jspdf changes
            var pdf = new jsPDF('p', 'mm', 'a4');
            pdf.addImage(myImage, 'png', 15, 2, imgWidth, imgHeight); // 2: 19

            pdf.save(`FormBuilderPDF.pdf`);
        });


    })
})