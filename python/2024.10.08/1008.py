'''
print("{}  {}  {}  {}".format("年度", "所得稅","營業稅","證交稅"))
print("{}   {}   {}  {}".format("2017","98.34","90.20","104.79"))
print("{}   {}  {}   {}".format("2016","83.00","110.50","82.45"))
print("{}   {}   {}  {}".format("2015","98.00","79.32","102.00"))
a = 5
b = 2
print(a + b)
print(a / b)
print(a * b)
print(a / b)
print(a % b)
print(a // b)
print(a ** b)
'''


up = int(input("請輸入上底"))
down = int(input("請輸入下底"))
h = int(input("請輸入高"))

ans = (up + down) * h / 2
print(ans)