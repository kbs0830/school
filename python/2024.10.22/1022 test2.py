x = float(input("輸入X座標點"))
y = float(input("輸入y座標點"))

x = float(x)
y = float(y)

if  x > 0 and y > 0:
    print("第一象限")
elif x < 0 and y > 0:
    print("第二象限")
elif x < 0 and y < 0:
    print("第三象限")    
elif x > 0 and y < 0:
    print("第四象限")
elif x == 0:
    print("在X軸上")    
elif y == 0:
    print("在Y軸上")    
        