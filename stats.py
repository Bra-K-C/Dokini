def imc(weight, height):
    return weight / (height * height)

def lengthStep(height):
    return height / 2.5

def nbStep(distance, height):
    return distance / lengthStep(height)

def basicEnergeticLose(weight, height, age):
    return weight * 10 + height * 6.25 - age * 5

def img(weight, height, age, sex):
    return 1.2 * imc(weight, height) + 0.23 * age - 10.8 * sex

def muscularWeight(weight, height, sex):
    if sex:
        return 0.407 * weight + 0.267 * height * 100 - 19.2
    else:
        return 0.252 * weight + 0.473 * height * 100 - 48.3