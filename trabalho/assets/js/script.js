document.addEventListener("DOMContentLoaded", function () {
    const total = parseInt(document.getElementById('formulario').dataset.total);

    //primeira pergunta
    const primeira = document.getElementById('pergunta-0');
    if (primeira) {
        primeira.style.display = 'block';
    }

    window.proxima = function(indice) {
        const radios = document.querySelectorAll(`#pergunta-${indice} input[type="radio"]`);
        let marcado = false;
        for (let radio of radios) {
            if (radio.checked) {
                marcado = true;
                break;
            }
        }
        if (!marcado) {
            alert("Por favor, marque uma nota antes de avançar.");
            return;
        }

        document.getElementById('pergunta-' + indice).style.display = 'none';

        if (indice + 1 === total) {
            document.getElementById('feedback').style.display = 'block';
        } else {
            document.getElementById('pergunta-' + (indice + 1)).style.display = 'block';
        }
    };
});