grades = []

while True:
    grade = input("請輸入學生成績 (按Enter結束): ")
    
    if grade == "":
        break
    
    grades.append(int(grade))

grades.sort(reverse=True)

print("排序後的成績 (由大到小):", grades)