#include <stdio.h>

int main(){

    int arr[3][4] = {
        {1, 2, 3, 4},
        {5, 6, 7, 8},
        {9, 10, 11, 12}
    };

    for (int i = 0; i < 3; i++){
        for (int j = 0; j < 4; j++){
            printf("arr[%d][%d] = %d\n", i, j, arr[i][j]);
        }
    }

    /*
    Output:
    arr[0][0] = 1
    arr[0][1] = 2
    arr[0][2] = 3
    arr[0][3] = 4
    arr[1][0] = 5
    arr[1][1] = 6
    arr[1][2] = 7
    arr[1][3] = 8
    arr[2][0] = 9
    arr[2][1] = 10;
    arr[2][2] = 11;
    arr[2][3] = 12;
    */

    int ary [2][3];

   ary[0][0] = 100;
   ary[0][1] = 200;
   ary[0][2] = 300;
   ary[1][0] = 400;
   ary[1][1] = 500;
   ary[1][2] = 600;

   for(int i = 0; i < 2; i++){
       for(int j = 0; j < 3; j++){
           printf("ary[%d][%d] = %d\n", i, j, ary[i][j]);
       }
   }

   /* Output:
   ary[0][0] = 100
   ary[0][1] = 200
   ary[0][2] = 300
   ary[1][0] = 400
   ary[1][1] = 500
   ary[1][2] = 600
   */

    return 0;
}