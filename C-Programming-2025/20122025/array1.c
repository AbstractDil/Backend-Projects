#include <stdio.h>

int main(){
    // integer array of size 5
    int arr[5] = {10, 20, 30, 40, 50};

    // for loop to print integer array elements
    for(int i = 0; i < 5; i++){
        printf("%d ", arr[i]);
    }

    // reverse order printing
    printf("\n");
    for(int i = 4; i >= 0; i--){
        printf("%d ", arr[i]);
    }

    // float array of size 3
    float arrf[3] = {1.1, 2.2, 3.3};
    printf("\n");
    for(int i = 0; i < 3; i++){
        printf("%.1f ", arrf[i]);
    }

    // char array of size 4
    char arrc[4] = {'A', 'B', 'C', 'D'};
    printf("\n");
    for(int i = 0; i < 4; i++){
        printf("%c ", arrc[i]);
    }

    printf("\n");
    return 0;
}