<html>

    <body style="background-color:lightGrey;">
        <center>
            <h1>Quacky Savings</h1>
        </center>
        <p id="title">Account Balence</p>
        <input type="number" id="accountAmount" name="accountAmount" onkeypress="calcReset()">
        <button onclick="calc()" id="setButton">Set</button>
        <br>
        <p id="title">Rainy Day Fund</p>
        <p id="rainy" name="savings">100</p>
        <p id="title">Food</p>
        <p id="food" name="savings">300</p>
        
        <p id="test"> </p>
    </body>
    
    <script>
        function calc() {
            var rainy = parseInt(document.getElementById("rainy").innerHTML);
            var food = parseInt(document.getElementById("food").innerHTML);
            
            var total = rainy+food;
            
            
            
            document.getElementById("accountAmount").value = document.getElementById("accountAmount").value - total;
            
            document.getElementById("setButton").disabled = true;
        }
        
        function calcReset() {
            document.getElementById("setButton").disabled = false;
        }
    </script>
    
</html>