
x = [-4, -2, 0, 2, 4]
y = [-734, -66, 2, -2, -318]

xz = 1


def la_div(la_x, x1, x2):
    return ((la_x - x1)/(x2 - x1))


def la_lag(la_x, yn):
    y_buff = 1
    y_buff *= y[yn]
    for xn in range(len(x)):
        if xn == yn:
            continue
        else:
            y_buff *= la_div(la_x, x[xn], x[yn])
    return y_buff


def la_lagrag(lax):
    w_buff = 0
    for yn in range(len(y)):
       w_buff += la_lag(lax, yn)
    return float(w_buff)


print(la_lagrag(xz))

