import { response } from "./main.js";
console.log(response);
export let documentsRow = `<tr>
      <th class="file_id"scope="row">6</th>
      <td class="file_name"></td>
      <td class="file_type"></td>
      <td class="file_tmpName"></td>
      <td class="file_error"></td>
      <td class="file_size"></td>
      <td class="file_date"></td>
      <td><a href=""><i class="bi bi-file-earmark-arrow-down-fill"></i></a> <a href="#"><i class="bi bi-pencil-fill"></i></a> <a href="#"><i class="bi bi-folder-symlink-fill"></i></a> <a href="${location.origin}/DAMS/uploads/deleteFile${fileUrl}" class="text-danger"><i class="bi bi-trash-fill"></i></a><span class="dropdown"><a class="more-actions" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a><ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item archive" href="#">Archive</a></li>
    <li><a class="dropdown-item encrypt" href="#">Encrypt</a></li>
    <li><a class="dropdown-item share" href="#">Share</a></li>
    </ul>
  </span></td>
    </tr>`;
