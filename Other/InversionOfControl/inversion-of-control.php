<?php

echo <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title>Inversion of Control (over flow of an application)</title>
        </head>
        <body>
        <button onclick="printA()">Print A</button> // flow of control is decided by a user clicking buttons
        <button onclick="printB()">Print B</button>
        <div id="result"></div>
        <script>
          function printA() {
            let result = document.getElementById('result');
            result.innerText += 'A';
          }
        
          function printB() {
            let result = document.getElementById('result');
            result.innerText += 'B';
          }
        </script>
        </body>
        </html>
        HTML;