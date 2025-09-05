import random

print("🎲 Bem-vindo ao Jogo de Adivinhação!")
print("Tente adivinhar o número entre 1 e 100.")

numero_secreto = random.randint(1, 100)
tentativas = 0

while True:
    palpite = input("Digite seu palpite: ")

    if not palpite.isdigit():
        print("⚠️ Digite um número válido!")
        continue

    palpite = int(palpite)
    tentativas += 1

    if palpite < numero_secreto:
        print("🔻 Muito baixo! Tente novamente.")
    elif palpite > numero_secreto:
        print("🔺 Muito alto! Tente novamente.")
    else:
        print(f"✅ Parabéns! Você acertou o número {numero_secreto} em {tentativas} tentativas.")
        break
