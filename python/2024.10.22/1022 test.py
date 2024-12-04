num = int()
kilogram = int(input("請輸入物品重量?"))
if kilogram <= 5 :
    num = 50
elif 10 >= kilogram > 5:
    num = 70
elif 15>= kilogram > 10:
    num = 90
elif 20 >= kilogram > 15:
    num = 110
elif kilogram >20 :
    num = 0
    
if num == 0:
    print("超過20公斤無法寄送")
else:
    print("所需的郵資為{}元".format(num))
        