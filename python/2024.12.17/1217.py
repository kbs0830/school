import random
while True:
    key = input()
    if key == "":
        print("遊戲結束。")
        break
    else:
        x=random.randint(1, 6)
        print(x)
