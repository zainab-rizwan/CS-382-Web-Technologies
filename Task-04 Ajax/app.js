let currentResult = "";
let currentOperator = "";
let pressedEqual = false;
function updateResult(value) {
  if (!pressedEqual) {
    currentResult += value;
    document.getElementById("result").value = currentResult;
  } else {
    currentResult = value;
    document.getElementById("result").value = currentResult;
    pressedEqual = false;
  }
}

function clearResult() {
  currentResult = "";
  currentOperator = "";
  document.getElementById("result").value = "";
}

function calculateResult() {
  const operands = currentResult.split(currentOperator);
  console.log(currentOperator);
  let result;
  switch (operands[1]) {
    case "+":
      console.log("yes");
      result = parseFloat(operands[0]) + parseFloat(operands[2]);
      console.log(result);
      break;
    case "-":
      result = parseFloat(operands[0]) - parseFloat(operands[2]);
      break;
    case "*":
      result = parseFloat(operands[0]) * parseFloat(operands[2]);
      break;
    case "/":
      result = parseFloat(operands[0]) / parseFloat(operands[2]);
      break;
  }
  // currentResult = result.toString();

  // console.log(result);
  document.getElementById("result").value = result.toString();
  currentOperator = "";
  operands[1] = "";
  operands[0] = "";
  operands[2] = "";
  pressedEqual = true;
}
