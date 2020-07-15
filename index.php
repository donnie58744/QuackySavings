<html>

    <body style="background-color:lightGrey;" onload="onload(),updateVals()" class="body">
        <center>
            <h1>Quacky Savings</h1>
        </center>
        <p id="title">Account Balence</p>
        <input type="number" id="accountAmount" name="accountAmount" class="numInputAlt" disabled value="0">
        <button onclick="addSub(this.value,this.id)" id="accountAmountPlus">+/-</button>
        <input type="number" id="accountAmountNum" class="numInput">
        <br>
        <p id="title">Rainy Day Fund</p>
        <input type="number" id="rainy" name="savings" onkeypress="calcReset()" disabled value="0" class="numInputAlt">
        <button onclick="addSub(this.value,this.id)" id="rainyPlus">+/-</button>
        <input type="number" id="rainyNum" class="numInput">
        <p id="title">Food</p>
        <p id="food" name="savings">0</p>
        
        <p id="test"> </p>
    </body>
    
    <script>
        var amount = 0;
        var rainy = 0;
        var food = 0;
        var letter = /^[a-zA-Z]+$/;
        var toggle = 0;
        
        function onload() {
            var x = document.getElementsByClassName("numInput");
            var i;
            for (i = 0; i < x.length; i++) {
              x[i].style.visibility = "hidden";
            }
            
            test();
        }
        
        function updateVals() {
            document.getElementById("accountAmountPlus").value = document.getElementById("accountAmount").value;
            document.getElementById("accountAmountPlus").id = document.getElementById("accountAmount").id;
            
            document.getElementById("rainyPlus").value = document.getElementById("rainy").value;
            document.getElementById("rainyPlus").id = document.getElementById("rainy").id;
        }
        
        function calcReset() {
            document.getElementById("setButton").disabled = false;
        }
        
        function addSub(clicked_value,clicked_id){
            console.log(clicked_id);
            toggle += 1;
            if (toggle == 1) {
                document.getElementById(clicked_id + "Num").style.visibility = "visible";
                document.getElementById(clicked_id + "Num").focus();
            }
            
            if (toggle == 2) {
                if (document.getElementById(clicked_id + "Num").value == "") {
                    document.getElementById(clicked_id + "Num").style.visibility = "hidden";
                    toggle = 0;
                }
                else {
                    amount = document.getElementById(clicked_id + "Num");
                    amount = parseInt(amount.value);
                    if (clicked_id == "rainy") {
                        document.getElementById("accountAmount").value = document.getElementById("accountAmount").value - document.getElementById("rainyNum").value;
                        document.getElementById(clicked_id).value = parseInt(document.getElementById(clicked_id).value) + amount;    
                    }
                    else {   
                        document.getElementById(clicked_id).value = parseInt(document.getElementById(clicked_id).value) + amount;
                        localStorage.setItem("lastAmount", amount);
                        update()
                    }
                    
                    document.getElementById(clicked_id + "Num").value = "";
                    document.getElementById(clicked_id + "Num").style.visibility = "hidden";
                    
                    toggle = 0;
                }
            }
            
            document.getElementById(clicked_id + "Num").addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
                if (event.keyCode === 13) {
                    // Cancel the default action, if needed
                    event.preventDefault();
                    // Trigger the button element with a click
                    
                    addSub(clicked_value,clicked_id);
                    document.getElementById(clicked_id + "Num").style.visibility = "hidden";
                }
            });
            
        }
        
        function update() {
            var dif = parseInt(localStorage.getItem("lastAmount")) * -1 - document.getElementById("accountAmount").value;
            if (document.getElementById("accountAmount").value < 0) {
                document.getElementById("accountAmount").value = dif;
            }
        }
        
        function test() {
            
            console.log((12) * -1);
            
        }
    </script>
    
    <style>
        .body {
            zoom:200%;
        }
        
        .numInputAlt {
            width: 80px;
        }
        
        .numInput {
            width: 80px;
        }
    </style>
    
</html>