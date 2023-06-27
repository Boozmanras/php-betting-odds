<script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        function setCharacterLimit(textareaId, charCountId, charLimit) {
            var textarea = document.getElementById(textareaId);
            var charCountDisplay = document.getElementById(charCountId);

            textarea.addEventListener("input", function() {
                var text = textarea.value;

                // Update the character count display
                charCountDisplay.textContent = text.length;

                // Check if the character count exceeds the limit
                if (text.length > charLimit) {
                    // Truncate the text to the specified limit
                    textarea.value = text.slice(0, charLimit);
                }
            });
        }

        // Set character limit for textarea1
        setCharacterLimit("textarea1", "charCount1", 500);

        // Set character limit for textarea2
        setCharacterLimit("textarea2", "charCount2", 50);
        setCharacterLimit("inputTextarea", "charCount3", 1000)
    </script>
</body>

</html>