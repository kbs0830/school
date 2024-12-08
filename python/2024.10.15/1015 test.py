price = int(input("請輸入價格："))
if price >10000:
    price=price*0.9
    print(price)
else:
    print(price)
    
n = int(input("請輸入一個整數："))
if n % 2 == 0:
    print("偶數")
else:
    print("奇數")

a,b,c=input("輸入為一行字串,包含了三個數值,每個數值以空白隔開：").split()
a=int(a)
b=int(b)
c=int(c)
if a < b + c and b < a + c and c < a + b:
    print("fit")
else:
    print("unfit")