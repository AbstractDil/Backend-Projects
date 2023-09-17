<!DOCTYPE html>
<html>
<head>
    <title>Spell Checker</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-spellcheck/0.2/jquery.spellcheck.min.js"></script>
</head>
<body>
    <h1>Spell Checker</h1>
    
    <h2>Given Paragraph</h2>
    <p id="givenParagraph">
        This is a sample paragraph with some words spelled correctly and some with typos.
    </p>
    
    <h2>User Input</h2>
    <textarea id="userInput" rows="5" cols="50"></textarea>
    <button onclick="checkSpelling()">Check Spelling</button>

    <h2>Spelling Errors</h2>
    <div id="output"></div>

    <script>
        function checkSpelling() {

            alert ("Spelling Error");

            const userInput = $('#userInput').val();
            const misspelledWords = [];

            // Define the given paragraph
            const givenParagraph = "This is a sample paragraph with some words spelled correctly and some with typos.";

            // Tokenize the given paragraph into words
            const givenWords = givenParagraph.split(/\s+/);

            // Clear any previous spell check results
            $('#output').empty();
            $('#userInput').spellcheck('clear');
            $('#userInput').spellcheck();

            // Run the spell check
            $('#userInput').spellcheck('check', function (result) {
                $.each(result, function (i, word) {
                    // Check if the misspelled word is not in the given paragraph
                    if (givenWords.indexOf(word.word) === -1) {
                        misspelledWords.push(word.word);
                    }
                });

                const output = $('#output');
                if (misspelledWords.length > 0) {
                    output.html('Misspelled Words: ' + misspelledWords.join(', '));
                    console.log(output + ' words were successfully processed');
                } else {
                    output.html('No spelling errors found.');
                    console.log(output +'words were successfully processed');

                    
                }
            });
        }
    </script>
</body>
</html>
