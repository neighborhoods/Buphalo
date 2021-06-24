# Testing Per-Actor Template Trees

This is to test per-Actor template tree preferences.

## Test Cases:
Based on the fabrication file using the following definition
```yaml
preferredTemplateTrees:
  - secondary
```

| File   | Actor Preference             | In Primary | In Secondary | In Tertiary | Selected  | 
|--------|------------------------------|------------|--------------|-------------|-----------| 
| AA.php | no preference                | No         | No           | Yes         | tertiary  | 
| AB.php | no preference                | No         | Yes          | No          | secondary | 
| AC.php | no preference                | No         | Yes          | Yes         | secondary | 
| AD.php | no preference                | Yes        | No           | No          | primary   | 
| AE.php | no preference                | Yes        | No           | Yes         | primary   | 
| AF.php | no preference                | Yes        | Yes          | No          | secondary | 
| AG.php | no preference                | Yes        | Yes          | Yes         | secondary | 
| AH.php | primary                      | No         | No           | Yes         | tertiary  | 
| AI.php | primary                      | No         | Yes          | No          | secondary | 
| AJ.php | primary                      | No         | Yes          | Yes         | secondary | 
| AK.php | primary                      | Yes        | No           | No          | primary   | 
| AL.php | primary                      | Yes        | No           | Yes         | primary   | 
| AM.php | primary                      | Yes        | Yes          | No          | primary   | 
| AN.php | primary                      | Yes        | Yes          | Yes         | primary   | 
| AO.php | secondary                    | No         | No           | Yes         | tertiary  | 
| AP.php | secondary                    | No         | Yes          | No          | secondary | 
| AQ.php | secondary                    | No         | Yes          | Yes         | secondary | 
| AR.php | secondary                    | Yes        | No           | No          | primary   | 
| AS.php | secondary                    | Yes        | No           | Yes         | primary   | 
| AT.php | secondary                    | Yes        | Yes          | No          | secondary | 
| AU.php | secondary                    | Yes        | Yes          | Yes         | secondary | 
| AV.php | tertiary                     | No         | No           | Yes         | tertiary  | 
| AW.php | tertiary                     | No         | Yes          | No          | secondary | 
| AX.php | tertiary                     | No         | Yes          | Yes         | tertiary  | 
| AY.php | tertiary                     | Yes        | No           | No          | primary   | 
| AZ.php | tertiary                     | Yes        | No           | Yes         | tertiary  | 
| BA.php | tertiary                     | Yes        | Yes          | No          | secondary | 
| BB.php | tertiary                     | Yes        | Yes          | Yes         | tertiary  | 
| BC.php | primary, secondary           | No         | No           | Yes         | tertiary  | 
| BD.php | primary, secondary           | No         | Yes          | No          | secondary | 
| BE.php | primary, secondary           | No         | Yes          | Yes         | secondary | 
| BF.php | primary, secondary           | Yes        | No           | No          | primary   | 
| BG.php | primary, secondary           | Yes        | No           | Yes         | primary   | 
| BH.php | primary, secondary           | Yes        | Yes          | No          | primary   | 
| BI.php | primary, secondary           | Yes        | Yes          | Yes         | primary   | 
| BJ.php | primary, tertiary            | No         | No           | Yes         | tertiary  | 
| BK.php | primary, tertiary            | No         | Yes          | No          | secondary | 
| BL.php | primary, tertiary            | No         | Yes          | Yes         | tertiary  | 
| BM.php | primary, tertiary            | Yes        | No           | No          | primary   | 
| BN.php | primary, tertiary            | Yes        | No           | Yes         | primary   | 
| BO.php | primary, tertiary            | Yes        | Yes          | No          | primary   | 
| BP.php | primary, tertiary            | Yes        | Yes          | Yes         | primary   | 
| BQ.php | secondary, primary           | No         | No           | Yes         | tertiary  | 
| BR.php | secondary, primary           | No         | Yes          | No          | secondary | 
| BS.php | secondary, primary           | No         | Yes          | Yes         | secondary | 
| BT.php | secondary, primary           | Yes        | No           | No          | primary   | 
| BU.php | secondary, primary           | Yes        | No           | Yes         | primary   | 
| BV.php | secondary, primary           | Yes        | Yes          | No          | secondary | 
| BW.php | secondary, primary           | Yes        | Yes          | Yes         | secondary | 
| BX.php | secondary, tertiary          | No         | No           | Yes         | tertiary  | 
| BY.php | secondary, tertiary          | No         | Yes          | No          | secondary | 
| BZ.php | secondary, tertiary          | No         | Yes          | Yes         | secondary | 
| CA.php | secondary, tertiary          | Yes        | No           | No          | primary   | 
| CB.php | secondary, tertiary          | Yes        | No           | Yes         | tertiary  | 
| CC.php | secondary, tertiary          | Yes        | Yes          | No          | secondary | 
| CD.php | secondary, tertiary          | Yes        | Yes          | Yes         | secondary | 
| CE.php | tertiary, primary            | No         | No           | Yes         | tertiary  | 
| CF.php | tertiary, primary            | No         | Yes          | No          | secondary | 
| CG.php | tertiary, primary            | No         | Yes          | Yes         | tertiary  | 
| CH.php | tertiary, primary            | Yes        | No           | No          | primary   | 
| CI.php | tertiary, primary            | Yes        | No           | Yes         | tertiary  | 
| CJ.php | tertiary, primary            | Yes        | Yes          | No          | primary   | 
| CK.php | tertiary, primary            | Yes        | Yes          | Yes         | tertiary  | 
| CL.php | tertiary, secondary          | No         | No           | Yes         | tertiary  | 
| CM.php | tertiary, secondary          | No         | Yes          | No          | secondary | 
| CN.php | tertiary, secondary          | No         | Yes          | Yes         | tertiary  | 
| CO.php | tertiary, secondary          | Yes        | No           | No          | primary   | 
| CP.php | tertiary, secondary          | Yes        | No           | Yes         | tertiary  | 
| CQ.php | tertiary, secondary          | Yes        | Yes          | No          | secondary | 
| CR.php | tertiary, secondary          | Yes        | Yes          | Yes         | tertiary  | 
| CS.php | primary, secondary, tertiary | No         | No           | Yes         | tertiary  | 
| CT.php | primary, secondary, tertiary | No         | Yes          | No          | secondary | 
| CU.php | primary, secondary, tertiary | No         | Yes          | Yes         | secondary | 
| CV.php | primary, secondary, tertiary | Yes        | No           | No          | primary   | 
| CW.php | primary, secondary, tertiary | Yes        | No           | Yes         | primary   | 
| CX.php | primary, secondary, tertiary | Yes        | Yes          | No          | primary   | 
| CY.php | primary, secondary, tertiary | Yes        | Yes          | Yes         | primary   | 
| CZ.php | primary, tertiary, secondary | No         | No           | Yes         | tertiary  | 
| DA.php | primary, tertiary, secondary | No         | Yes          | No          | secondary | 
| DB.php | primary, tertiary, secondary | No         | Yes          | Yes         | tertiary  | 
| DC.php | primary, tertiary, secondary | Yes        | No           | No          | primary   | 
| DD.php | primary, tertiary, secondary | Yes        | No           | Yes         | primary   | 
| DE.php | primary, tertiary, secondary | Yes        | Yes          | No          | primary   | 
| DF.php | primary, tertiary, secondary | Yes        | Yes          | Yes         | primary   | 
| DG.php | secondary, primary, tertiary | No         | No           | Yes         | tertiary  | 
| DH.php | secondary, primary, tertiary | No         | Yes          | No          | secondary | 
| DI.php | secondary, primary, tertiary | No         | Yes          | Yes         | secondary | 
| DJ.php | secondary, primary, tertiary | Yes        | No           | No          | primary   | 
| DK.php | secondary, primary, tertiary | Yes        | No           | Yes         | primary   | 
| DL.php | secondary, primary, tertiary | Yes        | Yes          | No          | secondary | 
| DM.php | secondary, primary, tertiary | Yes        | Yes          | Yes         | secondary | 
| DN.php | secondary, tertiary, primary | No         | No           | Yes         | tertiary  | 
| DO.php | secondary, tertiary, primary | No         | Yes          | No          | secondary | 
| DP.php | secondary, tertiary, primary | No         | Yes          | Yes         | secondary | 
| DQ.php | secondary, tertiary, primary | Yes        | No           | No          | primary   | 
| DR.php | secondary, tertiary, primary | Yes        | No           | Yes         | tertiary  | 
| DS.php | secondary, tertiary, primary | Yes        | Yes          | No          | secondary | 
| DT.php | secondary, tertiary, primary | Yes        | Yes          | Yes         | secondary | 
| DU.php | tertiary, primary, secondary | No         | No           | Yes         | tertiary  | 
| DV.php | tertiary, primary, secondary | No         | Yes          | No          | secondary | 
| DW.php | tertiary, primary, secondary | No         | Yes          | Yes         | tertiary  | 
| DX.php | tertiary, primary, secondary | Yes        | No           | No          | primary   | 
| DY.php | tertiary, primary, secondary | Yes        | No           | Yes         | tertiary  | 
| DZ.php | tertiary, primary, secondary | Yes        | Yes          | No          | primary   | 
| EA.php | tertiary, primary, secondary | Yes        | Yes          | Yes         | tertiary  | 
| EB.php | tertiary, secondary, primary | No         | No           | Yes         | tertiary  | 
| EC.php | tertiary, secondary, primary | No         | Yes          | No          | secondary | 
| ED.php | tertiary, secondary, primary | No         | Yes          | Yes         | tertiary  | 
| EE.php | tertiary, secondary, primary | Yes        | No           | No          | primary   | 
| EF.php | tertiary, secondary, primary | Yes        | No           | Yes         | tertiary  | 
| EG.php | tertiary, secondary, primary | Yes        | Yes          | No          | secondary | 
| EH.php | tertiary, secondary, primary | Yes        | Yes          | Yes         | tertiary  | 
