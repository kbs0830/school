colors = ["紅色", "藍色", "綠色", "黃色", "紫色"]

while True:
    # 輸入不喜歡的顏色
    color_to_remove = input("請輸入不喜歡的顏色 (按Enter結束): ")
    
    if color_to_remove == "":
        break
    
    if color_to_remove in colors:
        colors.remove(color_to_remove)
        print(f"已刪除 {color_to_remove}，剩下的顏色: {colors}")
    else:
        print(f"{color_to_remove} 不在顏色列表中")

print("最終顏色列表:", colors)
