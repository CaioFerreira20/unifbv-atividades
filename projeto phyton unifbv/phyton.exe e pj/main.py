print("== Calucladora simples ==")
num1 = float(input("Digite o primeiro numero: "))
operador = input("Digite o operador (+,-,*,/): ")
num2 = float(input("Digite o segundo numero: "))

if operador == '+':
    resultado = num1 + num2
elif operador == '-':
    resultado = num1 - num2
elif operador == '*':
    resultado = num1 * num2
elif operador == '/':
    if num2 != 0:
        resultado = num1 / num2
    else:
        resultado = "Erro: divisão por zero!"
else:
    resultado = "Operador invalido."

print("Resultado:", resultado)