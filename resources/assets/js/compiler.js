import axios from 'axios';
import * as monaco from 'monaco-editor';
// import '../css/tailwind.css';

document.addEventListener('DOMContentLoaded', () => {
    const element = document.getElementById('editor');
    const editor = monaco.editor.create(element, {
        value: "<?php\n\n echo \"hello work\";",
        language: 'php',
        theme: 'vs-dark',
        padding: {
            top: 24,
        },
        fontSize: 16,
        fontFamily: 'Fira Code',
        minimap: {
            enabled: false
        },
    });

    document.getElementById('runButton').addEventListener('click', function() {
        const code = editor.getValue();

        generateOutput(code);
    });
})

async function generateOutput(code) {
    const output = document.getElementById('output');
    const loader = document.getElementById('loader');
    const errorContainer = document.getElementById('error');
    const errorMessage = document.getElementById('error-message');

    errorContainer.style.display = "none";
    output.style.display = "none";
    loader.style.display = 'flex';

    axios.post('http://phpcompiler.test/compile.php', { code })
        .then(response => response.data)
        .then(({ result, error = undefined }) => {
            if (error !== undefined) {
                errorMessage.innerText = error;
                errorContainer.style.display = "block";
            } else {
                output.innerText = result;
                output.style.display = "block";
            }

            loader.style.display = "none";
        });
}