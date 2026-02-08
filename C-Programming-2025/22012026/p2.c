#include <stdio.h>
#include <math.h>

int main() {
    double x, result;

    printf("Enter the value of x: ");
    
    if (scanf("%lf", &x)==1) {
        if (x < 0) {
            result = exp(x) - x;
        } else {
            result = sin(x) + 1;
        }
        printf("f(x) = %lf\n", result);
    }else{
        printf("Invalid input.\n");
    }

    return 0;
}